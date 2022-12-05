<!DOCTYPE html>
<html>
<head>
    <title>Laravel JQuery UI Autocomplete Search Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
      span.email-ids {
      float: left;
      /* padding: 4px; */
      border: 1px solid #ccc;
      margin-right: 5px;
      padding-left: 10px;
      padding-right: 10px;
      margin-bottom: 5px;
      background: #f5f5f5;
      padding-top: 3px;
      padding-bottom: 3px;
      border-radius: 5px;
  }
  span.cancel-email {
      border: 1px solid #ccc;
      width: 18px;
      display: block;
      float: right;
      text-align: center;
      margin-left: 20px;
      border-radius: 49%;
      height: 18px;
      line-height: 15px;
      margin-top: 1px;    cursor: pointer;
  }
  .col-sm-12.email-id-row {
      border: 1px solid #ccc;
  }
  .col-sm-12.email-id-row input {
      border: 0px; outline:0px;
  }
  span.to-input {
      display: block;
      float: left;
      padding-right: 11px;
  }
  .col-sm-12.email-id-row {
      padding-top: 6px;
      padding-bottom: 7px;
      margin-top: 23px;
  }
  #subject{
    border: none;
  }

  .col-sm-12 {
    margin-left: 130px;
    width: 80%;
}
body{
    background-color: aquamarine;
}
.card-header{
    background-color: chocolate;
    color: #f5f5f5;
}
.card{
    background-color: brown;
}
  </style>
</head>
<body>
     
<div class="container mt-2 ">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Send Email</h4>
                </div>
                <div class="card-body">
                    <form action="" id="sendEmail">
                        @csrf
                        <div class="col-sm-12 email-id-row">
                            <span class="to-input text-white">To</span>
                               <div class="all-mail">
                                   
                               </div>
                                <input type="email" name="to" class="enter-mail-id typeahead form-control search" id="to" placeholder="Email" />
                          </div><br><br><br><br>
                          <div class="col-sm-12 email-id-row">
                            <span class="to-input text-white">CC</span>
                               <div class="all-mail_1">
                                   
                               </div>
                                <input type="email" name="cc" class="enter-mail-id typeahead form-control search_1" id="c
                                c" placeholder="Email" />
                          </div>
                          
                          <div class="col-sm-12 email-id-row">
                            <span class="to-input text-white">BCC</span>
                               <div class="all-mail_2">
                                   
                               </div>
                                <input type="email" name="bcc" class="enter-mail-id typeahead form-control search_2" id="bcc" placeholder="Email" />
                                
                            </div>
                                <div class="col-sm-12 email-id-row">
                                    <textarea type="text" name="subject" class="enter-mail-id typeahead form-control " id="subject" placeholder="Subject" ></textarea>    
                                </div>
                                
                                <button type="submit" value="" class="btn btn-primary offset-6 mt-2" id="btn-submit" >send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    let selectedEmails = [];
    var path = "{{ route('autocomplete') }}";
  
    $( ".search" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
          // $('#search').val(ui.item.label);
          console.log(ui.item); 
          $(".all-mail").append(
              '<span class="email-ids">' +
                ui.item.value + 
                ' <span class="cancel-email">x</span></span>'
            );
            $(this).val("");
            selectedEmails.push(ui.item.value)
            console.log(selectedEmails)
           return false;
        }
      });
      $(document).on("click", ".cancel-email", function () {
        console.log($(this).parent().text().split(' ')[0])
        var index = selectedEmails.indexOf($(this).parent().text().split(' ')[0]);
        if (index !== -1) {
          selectedEmails.splice(index, 1);
        }
        console.log(selectedEmails)
  $(this).parent().remove();
    });
</script>

<script type="text/javascript">
    let selectedEmails_2 = [];
    var path = "{{ route('autocomplete') }}";
  
    $( ".search_2" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
          // $('#search_2').val(ui.item.label);
          console.log(ui.item); 
          $(".all-mail_2").append(
              '<span class="email-ids">' +
                ui.item.value + 
                ' <span class="cancel-email">x</span></span>'
            );
            $(this).val("");
            selectedEmails_2.push(ui.item.value)
            console.log(selectedEmails_2)
           return false;
        }
      });
      $(document).on("click", ".cancel-email", function () {
        console.log($(this).parent().text().split(' ')[0])
        var index = selectedEmails_2.indexOf($(this).parent().text().split(' ')[0]);
        if (index !== -1) {
          selectedEmails_2.splice(index, 1);
        }
        console.log(selectedEmails_2)
  $(this).parent().remove();
});
</script>

<script type="text/javascript">
    let selectedEmails_1 = [];
    var path = "{{ route('autocomplete') }}";
  
    $( ".search_1" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
          // $('#search').val(ui.item.label);
          console.log(ui.item); 
          $(".all-mail_1").append(
              '<span class="email-ids">' +
                ui.item.value + 
                ' <span class="cancel-email">x</span></span>'
            );
            $(this).val("");
            selectedEmails_1.push(ui.item.value)
            console.log(selectedEmails_1)
           return false;
        }
      });
      $(document).on("click", ".cancel-email", function () {
        console.log($(this).parent().text().split(' ')[0])
        var index = selectedEmails_1.indexOf($(this).parent().text().split(' ')[0]);
        if (index !== -1) {
          selectedEmails_1.splice(index, 1);
        }
        console.log(selectedEmails_1)
  $(this).parent().remove();
});
</script>
<script>
    $("#sendEmail").submit(function(e){
        e.preventDefault();
        let to = $("#to").val();
        let cc = $("#cc").val();
        let bcc = $("#bcc").val();
        let subject = $("#subject").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
          url:"{{route('emailsend')}}",
          type:"POST",
          data:{
            to:to,
            cc:cc,
            bcc:bcc,
            subject:subject,
            _token:_token
          },
          success:function(response){
            if (response) {
                $('tbody').prepend(
                    '<tr>'+
                    '<td>'+response.to+'</td>'+
                    '<td>'+response.cc+'</td>'+
                    '<td>'+response.bcc+'</td>'+
                    '<td>'+response.subject+'</td>'+
                    '</tr>');                
                $("#sendEmail")[0].reset();
            }
          }
        });
    });
    </script>
    </body>
    </html>