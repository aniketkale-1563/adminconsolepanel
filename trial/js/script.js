// js/script.js

function loadStudentDetails() {
    $.ajax({
        type: "GET",
        url: "admin/get_students.php",
        success: function(data) {
            $("#studentDetails").html(data);
        }
    });
}

$(document).ready(function() {
    loadStudentDetails();
});
