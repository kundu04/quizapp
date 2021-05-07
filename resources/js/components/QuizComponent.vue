<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Online Quiz
                    <span class="float-right">{{questionIndex}}/{{questions.length}}</span>
                    </div>

                    <div class="card-body">
                        <span class="float-right" style="color:red">{{times}}</span>
                        <div v-for="(question,index) in questions">
                        <div v-show="index===questionIndex">
                        {{question.name}}
                        <ol>
                            <li v-for="choice in question.rel_answer">
                                <label>
                                    <input type="radio"
                                    :value="choice.is_correct==true?true:
                                    choice.answer"
                                    :name="index"
                                    v-model="userResponses[index]"
                                    @click="choices(question.id,choice.id)"
                                    >
                                    {{choice.answer}}
                                </label>
                            </li>
                        </ol>
                        </div>
                        </div>
                        <div v-show="questionIndex!=questions.length">
                            <button v-if="questionIndex>0" class="btn btn-success float-right" @click="prev">Prev</button>
                            <button class="btn btn-success" @click="next();postuserChoice()">Next</button>
                        </div>    
                        
                        <div v-show="questionIndex === questions.length">
                            <p>
                                <center>
                                    You got:{{score()}}/{{questions.length}}
                                </center>
                            </p>
                        </div>   
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const moment = require('moment');
    export default {
        props:['quizId','quizQuestion','hasQuizPlayed','time'],
        data(){
            return{
                questions:this.quizQuestion,
                questionIndex:0,
                userResponses:Array(this.quizQuestion.length).fill(false),
                correctQuestion:0,
                currectAnswer:0,
                clock:moment(this.time*60*1000)
            }
        },
        mounted() {
            setInterval(()=>{
                this.clock=moment(this.clock.subtract(1,'seconds'))
            },1000);
            
        },

        computed:{
            times:function(){
                var minsec=this.clock.format('mm:ss');
                if(minsec=='00:00'){
                    alert('timeout!')
                    window.location.reload();
                }
                return minsec
            }
        },
       
        methods:{
            next(){
                this.questionIndex++
            },
            prev(){
                this.questionIndex--
            },
            choices(question,answer){
                this.currectAnswer=answer,
                this.currectQuestion=question
            },
           score(){
               return this.userResponses.filter((val)=>{
                   return val===true;
               }).length
           },
           postuserChoice(){
               axios.post('outcome',{
                   answerId:this.currectAnswer,
                   questionId:this.currectQuestion,
                   quizId:this.quizId
               }).then((response)=>{
                   console.log(response)
               }).catch((error)=>{
                   alert("Error!")
               });
           }

        }
    }
</script>
