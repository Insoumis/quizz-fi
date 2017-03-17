<template>
    <div class="container-fluid">

        <!-- <h1>Quizz {{ quizzId }}</h1> -->
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 fi-accueil-bloc">
                <div class="fi-top-menu">
                    <a class="fi-facebook" href=""></a>
                    <a class="fi-twitter" href=""></a>
                    <a class="fi-youtube" href=""></a>
                    <a class="btn btn-info btn-sm fi-top-propositions" href="/top">
                        <i class="fa fa-trophy"></i>
                        Top des propositions
                    </a>
                </div>

                <div class="alert alert-danger" v-if="showAnswerQuestionText">
                    Vous devez sélectionner une réponse.
                </div>

                <div class="panel panel-default fi-boite-question">
                    <div class="panel-body fi-panel-proposition">
                        <question
                                v-for="question in quizz.questions"
                                v-show="currentQuestion == question"
                                :key="question"

                                :question="question"
                                :nbQuestions="quizz.questions.length"
                                :questionNumber="questionNumber"
                        >
                        </question>

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left fi-passage-question">
                                    <button class="btn btn-primary" @click="previousQuestion"
                                            v-if="currentQuestion != firstQuestion">
                                            <strong><i class="glyphicon glyphicon-chevron-left"></i> Proposition précédente</strong>
                                    </button>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right fi-passage-question">
                                    <button class="btn btn-success" @click="submit" v-if="currentQuestion == lastQuestion" :disabled="!allIsAnswered"><i
                                            class="glyphicon glyphicon-check"></i> Voir les résultats
                                    </button>
                                    <button class="btn btn-primary" @click="nextQuestion" v-if="currentQuestion != lastQuestion" :disabled="currentQuestionNeedAnswer">
                                        <strong>Proposition suivante <i class="glyphicon glyphicon-chevron-right"></i></strong>
                                     </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import _ from 'lodash'

    import Question from './Question.vue'

    export default {
        computed: {
            questionNumber() {
                return _.indexOf(this.quizz.questions, this.currentQuestion)+1
            },
            allIsAnswered() {
                let nbAnswered = 0
                for (let i in this.quizz.questions) {
                    if (this.quizz.questions[i].answer != null) {
                        nbAnswered++
                    }
                }
                return nbAnswered == this.quizz.questions.length;
            },
            firstQuestion() {
                return this.quizz.questions[0]
            },
            lastQuestion() {
                return this.quizz.questions[this.quizz.questions.length - 1]
            },
            currentQuestionNeedAnswer() {
                return this.currentQuestion.answer == null
            },
        },
        components: {
            Question
        },
        data() {
            return {
                quizz: {
                    questions: [],
                },
                currentQuestion: {},
                showAnswerQuestionText: false,
            }
        },
        props: ['quizzId'],

        methods: {
            submit() {
                axios.put(`/api/quizz/${this.quizzId}`, this.quizz)
                    .then((response) => {
                            window.location.href = response.data;
                        }
                    )
                    .catch((error) => {
                        alert("Impossible de sauvegarder vos données, veuillez réessayer");
                    });
            },
            previousQuestion() {
                this.showAnswerQuestionText = false
                const idx = _.indexOf(this.quizz.questions, this.currentQuestion)
                this.currentQuestion = this.quizz.questions[idx - 1]
            },
            nextQuestion() {
                this.showAnswerQuestionText = false
                if (this.currentQuestionNeedAnswer) {
                    this.showAnswerQuestionText = true
                    return;
                }

                const idx = _.indexOf(this.quizz.questions, this.currentQuestion)
                this.currentQuestion = this.quizz.questions[idx + 1]
            }
        },


        mounted() {
            axios.get(`/api/quizz/${this.quizzId}`)
                .then((response) => {
                        this.quizz = response.data
                        this.currentQuestion = this.quizz.questions[0];
                    }
                )
                .catch((error) => {
                    window.location.href = `/api/quizz/${this.quizzId}`
                });
        }
    }
</script>
