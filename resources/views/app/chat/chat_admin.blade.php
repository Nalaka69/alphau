<style>
    #chat_list {
        max-height: 70vh;
        overflow-y: auto;
    }
</style>

<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title mb-1" id="replyModalLabel">Reply to: <span id="mdl_msg"></span></h5>
                <input type="text" id="base_msg_id" hidden>
                <textarea class="form-control" id="reply_msg" rows="2"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" id="sendReplyBtn">Send</button>
            </div>
        </div>
    </div>
</div>

<ol class="list-group list-group-flush" id="chat_list" style="max-height: 70vh; overflow-y: auto;"></ol>

<script>
    $(document).ready(function(e) {
        loadData();

        $('#sendReplyBtn').on('click', function() {
            sendReply();
        });

        function sendReply() {
            var formData = new FormData();
            formData.append('reply_msg', $('#reply_msg').val());
            formData.append('msg_id', $('#base_msg_id').val());

            if (!$('#reply_msg').val()) {
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
                    url: '{{ route('admin.rply.store') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data, status, xhr) {
                        var statusCode = xhr.status;
                        if (statusCode === 200) {
                            $('#replyModal').modal('hide');
                            clearReplyFields(); // Clear reply modal fields after sending
                            loadData(); // Reload messages after sending a reply
                        } else {
                            loadData();
                            console.error('Error sending reply');
                        }
                    },
                    error: function() {
                        console.error('Error sending reply');
                    }
                });
            }
        }

        function loadData() {
            $.ajax({
                url: '{{ route('admin.admin.chat') }}',
                method: 'GET',
                success: function(data) {
                    displayChatList(data.admin_messages);
                },
                error: function(error) {
                    console.error('Error fetching programs:', error);
                }
            });

            function displayChatList(msgs) {
                var messageList = $('#chat_list');
                messageList.empty();
                msgs.forEach(function(msg) {
                    var chatElement = $(
                        '<li class="list-group-item d-flex justify-content-between align-items-start"></li>'
                    );
                    var innerDiv = $('<div class="ms-2 me-auto"></div>');
                    var createdAt = new Date(msg.created_at);
                    var time = createdAt.toLocaleString('en-US', {
                        hour: 'numeric',
                        minute: 'numeric',
                        hour12: true
                    });
                    var date = createdAt.toLocaleString('en-US', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric'
                    });
                    var formattedDate = '<span class="text-muted smaller">' + time + ', ' + date +
                        '</span>';
                    innerDiv.append('<div class="fw-bold fs-6 text-primary">' + msg.student_name +
                        ' <span class="fst-italic text-dark fw-light">-' + formattedDate +
                        '</span></div>');
                    innerDiv.append('<div class="fs-5 fw-normal text-dark">' + msg.message + '</div>');
                    chatElement.append(innerDiv);
                    var spanElement = $('<span class=""></span>');
                    // Check if a reply exists for the message
                    if (msg.reply) {
                        var replyDiv = $('<div class="fs-5 fw-normal text-dark text-end"></div>');
                        replyDiv.append('<div>' + msg.reply +
                            ' <i class="bi bi-reply-all-fill text-info"></i></div>');
                        chatElement.append(replyDiv);
                    } else {
                        var spanElement = $('<span class=""></span>');
                        var replyIcon = $(
                            '<b><i class="bi bi-reply-fill text-primary btn btn-lg btn_reply"></i></b>'
                        );
                        replyIcon.click(function() {
                            openReplyModal(msg.id, msg.message);
                        });
                        spanElement.append(replyIcon);
                        chatElement.append(spanElement);
                    }
                    spanElement.append(replyIcon);
                    chatElement.append(spanElement);
                    messageList.append(chatElement);
                });
            }
        }

        // Function to clear reply modal fields
        function clearReplyFields() {
            $('#reply_msg').val(''); // Clear reply message textarea
        }

        // Function to open the reply modal
        function openReplyModal(msg_id, msg_content) {
            $('#mdl_msg').text(msg_content);
            $('#base_msg_id').val(msg_id);
            // Set the message content in the modal
            $('#replyModal').modal('show');
        }
        // Initial load of messages
        loadData();

        // Automatic refresh every 30 seconds
        setInterval(function() {
            loadData();
        }, 30000);
    });
</script>
