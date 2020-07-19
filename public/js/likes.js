$(function() {
     $('#like').click('on', function(){
         $.ajax({
             url: "{{ route('like', ['id' => $post->id]), ['user_id' => $user->id]) }}",
             type: 'POST',
             data: {}
         })
         .done(function(response) {
             console.log(response);
             
         })

         .fail(function() {
             alert('エラー');
         });
     })

      
       
     
     
 });
