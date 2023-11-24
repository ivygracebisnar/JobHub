$(document).ready(function () {
    $('#over').on('click', function () {
        $('#list').toggle();
    });

    // Message with Ellipsis
    $('div.msg').each(function () {
        var len = $(this).text().trim().split(" ");
        if (len.length > 12) {
            var add_elip = $(this).text().trim().substring(0, 65) + "…";
            $(this).text(add_elip);
        }
    });

    $("#bell-count").on('click', function (e) {
        e.preventDefault();
        let belvalue = $('#bell-count').attr('data-value');
        if (belvalue === '') {
            console.log("inactive");
        } else {
            $(".round").hide();
            $("#list").show();

            $('.message').click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: './connection/deactive.php',
                    type: 'POST',
                    data: { "id": $(this).data('id') },
                    success: function (data) {
                        console.log(data);
                        location.reload();
                    }
                });
            });
        }
    });

    $('#notify').on('click', function (e) {
        e.preventDefault();

        var jobtitle = $('#jobtitle').val();
        var description = $('#description').val();
        var requirements = $('#requirements').val();
        var address = $('#address').val();
        var salary = $('#salary').val();
        var dateposted = $('#dateposted').val();

        if ($.trim(jobtitle) && $.trim(description) && $.trim(requirements) &&
            $.trim(address) && $.trim(salary) && $.trim(dateposted)) {

            var form_data = $('#frm_data').serialize();
            $.ajax({
                url: './connection/insert.php',
                type: 'POST',
                data: form_data,
                success: function (data) {
                    alert(data);
                    location.reload();
                }
            });
        } else {
            alert("Please fill in all the fields");
        }
    });

    function fetchNotifications() {
        $.ajax({
            url: './get_notifications.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#list').empty();

                if (data.length > 0) {
                    data.forEach(function (item) {
                        $('#list').append(`
                            <li id="message_items">
                                <div class="message alert alert-warning" data-id=${item.n_id}>
                                    <span>${item.jobtitle}</span>
                                    <div class="msg">
                                        <p>${item.description}</p>
                                    </div>
                                </div>
                            </li>
                        `);
                    });
                }
            }
        });
    }

    fetchNotifications();

    setInterval(function () {
        $.ajax({
            url: './connection/check_for_new_jobs.php',
            type: 'GET',
            success: function (data) {
                if (data === 'true') {
                    alert("New job posted!");
                }
            }
        });
    }, 5000); // 5000 milliseconds = 5 seconds
});
