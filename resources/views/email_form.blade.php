<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Email Form</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
        <style>
            #infinite-list {
           /* We need to limit the height and show a scrollbar */
                     width: 100%;
                     height: 300px;
                     overflow: auto;
     
           /* Optional, only to check that it works with margin/padding */
                     /*margin: 30px;*/
                     padding: 20px;
                     /*border: 10px solid black;*/
         }
         .pt-1 {
         padding: -1px !important;
     }
        .col-md-10 {
         padding: 12px;
     }
         span.to-input {
         margin-bottom: 9px;
     }
     
         .has-search{
           width: 100%;
         }
         .has-search .form-control {
             padding: 12px 0 12px 30px !important;
         }
     
         .has-search .form-control-feedback {
             position: absolute;
             bottom: 13px;
             z-index: 2;
             display: block;
             width: 2.375rem;
             height: 2.375rem;
             line-height: 2.375rem;
             text-align: center;
             pointer-events: none;
             color: #aaa;
         }
         button#send_form {
         padding: 5px 22px;
         margin: 0px;
     }
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
           /* .col-sm-12.email-id-row {
               border: 1px solid #ccc;
           } */
         
           span.to-input {
               display: block;
               float: left;
               padding-right: 11px;
           }
             .email-id-row {
               padding-top: 2px;
               padding-bottom: 5px;
               margin-top: 23px;
                 /* display: flex;
                 flex-wrap: wrap; */
                 gap: 4px;
                 padding: 4px;
                 border: 1px solid #34ebe5;
                 border-radius: 4px;
           }
           .email-id-row > * {
                 flex-shrink: 1;
             }
     
             #email_cc {
                 border: none;
             }
             #cc_mail{
               border: none;
             }
             #to{
               border: none;
             }
             #email_to{
               border: none;
             }
             .email-id-row_1{
                 display: flex;
                 flex-wrap: wrap;
                 gap: 4px;
                 padding: 4px;
                 border: 1px solid #34ebe5;
                 border-radius: 4px;
             }
             span.email_cc{
               float: left;
               padding: 4px;
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
               
     </style>
    </head>
    <body >
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Send Email</h4>
                        </div>
                        <div class="card-body">
                            <form id="sendEmail">
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">To</label>
                                  <input type="email" class="form-control" id="ToEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">CC</label>
                                  <div class="all-mail_1">
                                    
                                    </div>
                                  <input type="email" class="form-control search_1" id="ccEmail1">
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            var selectedEmails_1 = [];
                var path = "{{ route('autocomplete') }}";
        
                $(".search_1").autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: path,
                            type: 'GET',
                            dataType: "json",
                            data: {
                                search: request.term
                            },
                            success: function(data) {
                                response(data);
                            }
                        });
                    },
                    select: function(event, ui) {
                        // $('#search').val(ui.item.label);
                        console.log(ui.item);
                        if (selectedEmails_1.includes(ui.item.value)) {
                            $(this).val("");
                            return false;
                        }
                        $(".all-mail_1").append(
                            '<span class="email_cc">' +
                            ui.item.value +
                            ' <span class="cancel-email">x</span></span>'
                        );
                        $(this).val("");
                        selectedEmails_1.push(ui.item.value)
                        //sidha::
                       // $('#email_cc').val(selectedEmails_1);
                        //$('#email_cc').reset(selectedEmails_1);
                        // $("#email_cc").val(selectedEmails_1).reset();
                        //sidha::
                        return false;
                    }
                });
                $(document).on("click", ".cancel-email", function() {
                    console.log($(this).parent().text().split(' ')[0])
                    var index = selectedEmails_1.indexOf($(this).parent().text().split(' ')[0]);
                    if (index !== -1) {
                        selectedEmails_1.splice(index, 1);
                    }
                    console.log(selectedEmails_1)
                    $(this).parent().remove();
                });
        </script>
            <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>    </body>
</html>

