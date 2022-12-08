<template>
    <div class="xl:mx-20 md:mx-20">
        <div id="list-messages" class="mt-5 mb-2" v-for="message in incomingMessages">
            <p class="text-purple-700">
                <span>({{ message.time }})</span> <b>{{ message.name }}: </b> {{ message.text }}
            </p>
        </div>
        <div class="mt-3" >
            <label for="input-message">Message: </label>
            <input v-model="userInput"  type="text" placeholder="Message..."> <button v-on:click="sendMessage()">Send</button>
        </div>
    </div>
   
</template>

<script>
import axios from 'axios';

    export default {
        props: ['receiverId', 'loggedUser'],
        data(){
            return {
                userInput: null,
                incomingMessages: []
                // incomingMessages: [{
                //     time: '2022',
                //     name: 'Wisdom',
                //     text: 'Hello'
                // }]
            }
        }, 

        mounted() {
            console.log(this.receiverId);
            console.log(this.loggedUser);
            const channel = window.Echo.private('private.chat.'+this.loggedUser);

             channel.listen('.chat-message', (event) => {
                console.log(event);
                this.incomingMessages.push(event);
            });
        },

        methods: {
            
            sendMessage(){
                // alert('Hello');
                 axios.post('/chat-message', {
                    receiver_id: this.receiverId,
                    message: this.userInput
                }).then(function(){
                    alert('ho');
                }); 
            }
        },
    }
</script>