require('./bootstrap');

let auth_id = document.head.querySelector('meta[name="auth_id"]').content;
let event_id = document.head.querySelector('meta[name="event_id"]').content;
window.auth_id =auth_id;
console.log('event_id = ',event_id);

window.Echo.channel('ask-channel.'+auth_id)
    .listen('.AskEvent', (e) => {
        console.log(e);
    });


window.Echo.channel('vote-channel.'+event_id)
    .listen('.VoteEvent', (e) => {
        if (e.owner_id !=auth_id)
        {
            $('#insertVoteModalData').html(e.view);
            $('#voteModalResponse').modal('show');
        }
    });

window.Echo.channel('answer-channel.'+event_id)
    .listen('.AnswerEvent', (e) => {
        if (e.owner_id !=auth_id)
        {
            $('#insertAnswerModalData').html(e.view);
            $('#answerModalResponse').modal('show');
        }
    });

// window.Vue = require('vue');
//
// const app = new Vue({
//     el: '#app',
// });
