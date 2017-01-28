<template>
    <div class="panel panel-default">
        <div class="panel-body">

            <h2>{{ question.category.name }}</h2>

            <template v-if="!!question.question.page_no">
                <strong>Page {{ question.question.page_no }}</strong>
            </template>

            <p v-html="formattedProposition"></p>

            <p v-if="formatedDescription != ''" v-html="formatedDescription"></p>

            <div class="row text-center">
                <div class="col-md-2">
                    <label class="radio-inline">
                        <input v-model="question.answer" type="radio" :value="0" :name="'rep_' + question.id"/> 0
                    </label>
                </div>
                <div class="col-md-2">
                    <label class="radio-inline">
                        <input v-model="question.answer" type="radio" :value="25" :name="'rep_' + question.id"/> 25
                    </label>
                </div>
                <div class="col-md-2">
                    <label class="radio-inline">
                        <input v-model="question.answer" type="radio" :value="50" :name="'rep_' + question.id"/> 50
                    </label>
                </div>
                <div class="col-md-2">
                    <label class="radio-inline">
                        <input v-model="question.answer" type="radio" :value="75" :name="'rep_' + question.id"/> 75
                    </label>
                </div>
                <div class="col-md-2">
                    <label class="radio-inline">
                        <input v-model="question.answer" type="radio" :value="100" :name="'rep_' + question.id"/> 100
                    </label>
                </div>
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
        props: ['question'],
    }
</script>
