<?php
namespace Melenquizz\Http\Controllers\Api;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Melenquizz\Http\Controllers\Controller;
use Melenquizz\Quizz;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class QuizzController extends Controller
{
    public function show($quizzId)
    {
        return Quizz::with('questions', 'questions.question', 'questions.category')
            ->where('completed', false)
            ->where('uniqid', $quizzId)
            ->firstOrFail();
    }

    public function update(Request $request, $quizzId)
    {
        /** @var Quizz $quizz */
        $quizz = Quizz::with('questions')
            ->where('completed', false)
            ->where('uniqid', $quizzId)
            ->firstOrFail();

        /** @var array $result */
        $result = $request->json()->all();

        $this->guard($result, $quizz);

        foreach ($result['questions'] as $question) {
            $q = $quizz->questions->find($question['id']);
            $q->answer = $question['answer'];
            $q->save();
        }
        $quizz->completed = true;
        $quizz->save();

        return route("quizz.result", $quizzId);
    }

    /**
     * @param $result
     * @param $quizz
     */
    private function guard(array $result, Quizz $quizz)
    {
        $nbAnswered = 0;
        foreach ($result['questions'] as $question) {
            if (!in_array($question['answer'], [0, 25, 50, 75, 100])) {
                throw new BadRequestHttpException($question['answer'] . "is not a valid answer");
            }
            $nbAnswered++;
        }

        if ($nbAnswered != $quizz->type) {
            throw new BadRequestHttpException("We were unable to find " . $quizz->type . " valid asnwers in your request");
        }
    }
}
