<template>
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-md-6">
                    <h2>{{ question.category.name }}</h2>
                </div>
                <div class="col-md-6 text-right">
                    <template v-if="!!question.question.page_no">
                        <strong>Page {{ question.question.page_no }}</strong>
                    </template>
                </div>
            </div>


            <p class="proposition" v-html="formattedProposition"></p>

            <p class="description" v-if="formatedDescription != ''" v-html="formatedDescription"></p>

            <div class="row text-center">
                <button @click="selectAnswer(0, $event)" class="btn"
                        :class="{'btn-success': question.answer==0, 'btn-default': question.answer!=0}">Pas d'accord
                </button>
                <button @click="selectAnswer(25, $event)" class="btn"
                        :class="{'btn-success': question.answer==25, 'btn-default': question.answer!=25}">Plutôt pas
                    d'accord
                </button>
                <button @click="selectAnswer(50, $event)" class="btn"
                        :class="{'btn-success': question.answer==50, 'btn-default': question.answer!=50}">Neutre
                </button>
                <button @click="selectAnswer(75, $event)" class="btn"
                        :class="{'btn-success': question.answer==75, 'btn-default': question.answer!=75}">Plutôt
                    d'accord
                </button>
                <button @click="selectAnswer(100, $event)" class="btn"
                        :class="{'btn-success': question.answer==100, 'btn-default': question.answer!=100}">D'accord
                </button>
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
        props: ['question'],
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
