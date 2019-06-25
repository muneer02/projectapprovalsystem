$("#regForm").submit(function (event) {
    //stop submit the form, we will post it manually.
    event.preventDefault();

    // Get form
    var form = $('#regForm')[0];

    // Create an FormData object
    var data = new FormData(form);

    $.ajax({
        type: "POST",
        // enctype: 'multipart/form-data',
        url: "register.php",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {
            var index = data.indexOf('</html>');
            data = data.substring(index+7);
            alert(data);
            // var x = "You have been successfully registered.";
            // if (data == x) {
            //     window.location.assign("pdf/receipt.php")
            // }
        },
        error: function (e) {
            alert(e);
        }
    });

});


$("#loginForm").submit(function (event) {
    //stop submit the form, we will post it manually.
    event.preventDefault();

    // Get form
    var form = $('#loginForm')[0];

    // Create an FormData object
    var data = new FormData(form);

    $.ajax({
        type: "POST",
        // enctype: 'multipart/form-data',
        url: "login.php",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {
            var index = data.indexOf('</html>');
            data = data.substring(index+7);
            alert(data);
            // var x = "You have been successfully registered.";
            // if (data == x) {
            //     window.location.assign("pdf/receipt.php")
            // }
        },
        error: function (e) {
            alert(e);
        }
    });

});


$("#projectForm").submit(function (event) {
    //stop submit the form, we will post it manually.
    event.preventDefault();

    // Get form
    var form = $('#projectForm')[0];

    // Create an FormData object
    var data = new FormData(form);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "add_project.php",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {
            var index = data.indexOf('</html>');
            data = data.substring(index+7);
            alert(data);
            // var x = "You have been successfully registered.";
            // if (data == x) {
            //     window.location.assign("pdf/receipt.php")
            // }
        },
        error: function (e) {
            alert(e);
        }
    });

});


