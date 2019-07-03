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
            data = data.substring(index+9);
            alert(data);
            var x = "You have been successfully registered.";
            if (data == x) {
                window.location.assign("login.php")
            }
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
            data = data.substring(index+9);
            console.log('da',data);
            var x = "Login Successful";
            if (data == x) {
                window.location.assign("home.php")
            }
            else{
                alert(data);
            }
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
            data = data.substring(index+11);
            alert(data);
            var x = "Submission successful";
            console.log('x',data);
            if (data == x) {
                window.location.assign("home.php")
            }
        },
        error: function (e) {
            alert(e);
        }
    });

});


$("#updateProjectForm").submit(function (event) {
    //stop submit the form, we will post it manually.
    event.preventDefault();

    // Get form
    var form = $('#updateProjectForm')[0];

    // Create an FormData object
    var data = new FormData(form);
    var id = data.get('id');
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "update_project.php?id="+id,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {
            var index = data.indexOf('</html>');
            data = data.substring(index+11);
            alert(data);
            var x = "Submission successful";
            console.log('x',data);
            if (data == x) {
                window.location.assign("my_projects.php")
            }
        },
        error: function (e) {
            alert(e);
        }
    });

});


