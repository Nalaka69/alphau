<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css"
    integrity="sha512-oAvZuuYVzkcTc2dH5z1ZJup5OmSQ000qlfRvuoTTiyTBjwX1faoyearj8KdMq0LgsBTHMrRuMek7s+CxF8yE+w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    #send_btn {
        padding: 1rem 1rem;
        font-size: 1.21rem;
    }

    .snd_grp,
    .form-control {
        background-color: #dcffff;
    }

    #chat_list {
        max-height: 300px;
        overflow-y: auto;
        padding-right: 10px;
    }

    .list-group-item {
        width: 100%;
    }

    .list-group-item span {
        display: block;
    }
</style>

<ol class="list-group list-group-flush" id="chat_list"></ol>
<div class="input-group mb-3 snd_grp">
    <input type="text" class="form-control" placeholder="Type a message" id="send_msg">
    <b><i class="btn bi bi-send-fill text-success" type="button" id="send_btn"></i></b>
</div>
<script>
    $(document).ready(function() {
        $('#send_btn').click(function(e) {
            e.preventDefault();
            var formData = new FormData();
            formData.append('send_msg', $('#send_msg').val());
            if (!$('#send_msg').val()) {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Error',
                    text: 'Enter a message',
                    showConfirmButton: true
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('student.admin.chat') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data, status, xhr) {
                        var statusCode = xhr.status;
                        if (statusCode === 200) {
                            $('#send_msg').val('');
                            loadData();
                        } else {
                            loadData();
                        }
                    },
                });
            }
        });

        function loadData() {
            $.ajax({
                url: '{{ route('student.chat') }}',
                method: 'GET',
                success: function(data) {
                    displayChatList(data.student_messages);
                },
                error: function(error) {
                    console.error('Error fetching programs:', error);
                }
            });

            function displayChatList(msgs) {
                var messageList = $('#chat_list');
                messageList.empty(); // Clear the existing content before updating

                msgs.forEach(function(msg) {
                    if (msg.reply) {
                        var chatElement = $(
                            '<li class="list-group-item d-flex justify-content-between"></li>'
                        );
                        var innerDiv = $('<div class="ms-2 me-auto"></div>');
                        innerDiv.append('<div class="fw-bold fs-6 text-primary">' + msg.message +
                            ' <i class="bi bi-reply-all-fill text-info"></i></div>');
                        innerDiv.append('<div class="fs-5 fw-normal text-dark">' + msg.reply +
                            '</div>');
                        chatElement.append(innerDiv);
                        var replyDiv = $('<div class="fs-5 fw-normal text-dark text-end"></div>');
                        replyDiv.append('<div>' + msg.message + '</div>');
                        chatElement.append(replyDiv);

                        messageList.append(chatElement);
                    } else {
                        var chatElement = $(
                            '<li class="list-group-item d-flex justify-content-end align-items-end"></li>'
                        );
                        var replyDiv = $(
                            '<div class="fs-5 fw-normal text-dark d-flex justify-content-end"></div>'
                        );
                        replyDiv.append('<div>' + msg.message + '</div>');
                        chatElement.append(replyDiv);
                        messageList.append(chatElement);
                    }
                });
            }
        }

        loadData();
        setInterval(function() {
            loadData();
        }, 30000);
    });
</script>
