<template>
    <div class="container">

        <h1>Quizz {{ quizzId }}</h1>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="alert alert-danger" v-if="showAnswerQuestionText">
                    Vous devez sélectionner une réponse.
                </div>

                <question v-for="question in quizz.questions" :question="question"
                          v-show="currentQuestion == question"></question>

                <div class="row">

                    <div class="col-md-6 text-left">
                        <button class="btn btn-primary" @click="previousQuestion"
                                v-if="currentQuestion != firstQuestion"><i
                                class="glyphicon glyphicon-circle-arrow-left"></i> Question précédente
                        </button>
                    </div>

                    <div class="col-md-6 text-right">
                        <button class="btn btn-success" @click="submit" v-if="currentQuestion == lastQuestion" :disabled="!allIsAnswered"><i
                                class="glyphicon glyphicon-check"></i> Voir les résultats
                        </button>
                        <button class="btn btn-primary" @click="nextQuestion" v-if="currentQuestion != lastQuestion" :disabled="currentQuestionNeedAnswer">
                            Question suivante <i class="glyphicon glyphicon-circle-arrow-right"></i>
                         </button>
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
                    alert("Impossible de charger les questions de ce forumaire.");
                    window.location.href = "/"
                });
        }
    }
</script>
