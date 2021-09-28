<template>
    <div class="modal fade" id="shareLink">
        <div class="modal-dialog ">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <a class="text-dark text-decoration-none d-flex modal-title">
                        <span>
                            <i class="fa fa-facebook"></i>
                        </span>
                        <h4 class="font-weight-light ml-2"></h4>
                    </a>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h4 class="text-center mb-5">Share this via</h4>


                    <div class="row text-center">
                        <a href="" class="col-4 text-decoration-none" @click.prevent="copyToClipboard">
                            <i class="fa fa-link"></i>
                            <span class="d-block text-secondary mt-2">Copy link</span>
                        </a>

                        <a href="" target="_blank"
                           class="col-4 text-decoration-none">
                            <i class="fa fa-facebook"></i>
                            <span class="d-block text-secondary mt-2">Facebook</span>
                        </a>
                        <a href="" target="_blank" class="col-4 text-decoration-none">
                            <i class="fa fa-twitter"></i>
                            <span class="d-block text-secondary mt-2">Twitter</span>
                        </a>
                    </div>
                </div>


            </div>
        </div>

        <div class="alert text-light d-none bg-dark">Link copied to clipboard!</div>

    </div>
</template>

<script>
    export default {

        methods: {
            copyToClipboard() {

                // Create a "hidden" input
                var aux = document.createElement("input");

                // Assign it the value of the specified element
                let url = $('.fa-link').parent().attr('href');
                if (url == "")
                    url = window.location.href;

                aux.setAttribute("value", url);

                // Append it to the body
                document.body.appendChild(aux);

                // Highlight its content
                aux.select();

                // Copy the highlighted text
                document.execCommand("copy");

                // Remove it from the body
                document.body.removeChild(aux);


                let alert = $('#shareLink .alert');
                alert.removeClass('d-none');
                setTimeout(function () {
                    alert.css('bottom', '35px');

                    setTimeout(function () {
                        alert.css('bottom', '-100px');
                    }, 1500);

                }, 400);
            }
        },
        mounted() {
            let cls, title, url, text, facebook, twitter , shareLink;
            $('body').on('click', 'a.shares , .share-link', function () {
                cls = $(this).attr('data-cls');
                title = $(this).attr('data-title');
                url = $(this).attr('data-url');
                text = $(this).attr('data-text');
                facebook = 'http://www.facebook.com/sharer.php?u=' +url;
                twitter = 'http://twitter.com/share?url=' + url;

                shareLink = $('#shareLink');
                $('.fa-facebook').parent().attr('href' , facebook);
                $('.fa-twitter').parent().attr('href' , twitter);
                $('.fa-link').parent().attr('href' , url);
                shareLink.find('.modal-header h4').text(title);
                if (cls.length > 0){
                    shareLink.find('.modal-header i').removeClass().addClass(`fa ${cls}`);
                }else{
                    shareLink.find('.modal-header i').removeClass().addClass('fa fa-share-alt');

                }

            });

        }

    }
</script>
