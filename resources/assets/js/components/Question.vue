<template>
    <div class="fi-question">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-8">
                        <div class="fi-question-theme">
                            <img :src="'/images/themes/'+question.category.slug+'.png'"></img>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                        <div class="fi-question-numerotation text-center">
                            <span class="fi-numero-question-label"><strong>Question</strong></span><br />
                            <span class="fi-numero-question">{{ questionNumber }}/{{ nbQuestions }}</span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
                        <div class="fi-question-page">
                            <div class="fi-titre-programme">L'Avenir<br />en commun</div>
                            <div class="fi-page-programme">
                                <template v-if="!!question.question.page_no">
                                    Page {{ question.question.page_no }}
                                </template>
                            </div>
                        </div>
                    </div>
                </div>


                <p class="fi-proposition-texte" v-html="formattedProposition"></p>

                <p class="fi-description" v-if="formatedDescription != ''" v-html="formatedDescription"></p>
            </div>
        </div>
        <div class="row text-center fi-proposition-votes">
            <div class="col-lg-5ths col-md-5ths col-sm-5ths col-xs-5ths">
                <button @click="selectAnswer(0, $event)" class="btn fi-note"
                        :class="{'btn-success': question.answer==0, 'btn-default': question.answer!=0}">Vraiment<br/>contre</button>
            </div>
            <div class="col-lg-5ths col-md-5ths col-sm-5ths col-xs-5ths">
                <button @click="selectAnswer(25, $event)" class="btn fi-note"
                        :class="{'btn-success': question.answer==25, 'btn-default': question.answer!=25}">Plutôt<br/>contre</button>
            </div>
            <div class="col-lg-5ths col-md-5ths col-sm-5ths col-xs-5ths">
                <button @click="selectAnswer(50, $event)" class="btn fi-note"
                        :class="{'btn-success': question.answer==50, 'btn-default': question.answer!=50}">Vote<br/>blanc</button>
            </div>
            <div class="col-lg-5ths col-md-5ths col-sm-5ths col-xs-5ths">
                <button @click="selectAnswer(75, $event)" class="btn fi-note"
                        :class="{'btn-success': question.answer==75, 'btn-default': question.answer!=75}">Plutôt<br/>pour</button>
            </div>
            <div class="col-lg-5ths col-md-5ths col-sm-5ths col-xs-5ths">
                <button @click="selectAnswer(100, $event)" class="btn fi-note"
                        :class="{'btn-success': question.answer==100, 'btn-default': question.answer!=100}">Vraiment<br/>pour</button>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        computed: {
            formattedProposition() {
                return (this.question.question.proposition + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + '<br />' + '$2')
            },
            formatedDescription() {
                if (this.question.question.description == null || this.question.question.description == "") {
                    return ""
                }

                return (this.question.question.description + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + '<br />' + '$2')
            },
        },
        methods: {
            selectAnswer(value, $event) {
                this.question.answer = value
                $event.target.blur();
            }
        },
        props: ['question', 'nbQuestions', 'questionNumber']
    }
</script>


<style scoped>
    h2 {
        margin-top: 0;
    }

    p.proposition {
        font-weight: bold;
    }

    p.description {
        font-style: italic;
    }
</style>
