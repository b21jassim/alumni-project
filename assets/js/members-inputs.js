function displayInputs()
{
    document.getElementById('divId').innerHTML = ""
    var teamNum = document.getElementById("teamNum").value;
    for (var i = 1; i <= teamNum; i++) {
        var div = document.getElementById('divId');
        div.innerHTML += '<div class="form-group">\n\
                                    <div class="form-row">\n\
                                        <div class="col-md-6"><label for="memberID">ID:</label>\n\
                                           <input onchange="GetProjectMembers(this);getUserName(this);" name="id' + i + '" id="memberID' + i + '" class="form-control" type="text" aria-describedby="nameHelp" placeholder="ID" required=""></div>\n\
                                        <div class="col-md-6"><label for="memberName">Member Name:</label><input name="membername' + i + '" id="memberName' + i + '" class="form-control" type="text" aria-describedby="emailHelp" placeholder="Team Members" required=""></div></div></div>';
    }
}
function minmax(value, min, max)
{
    if (parseInt(value) < min || isNaN(parseInt(value)))
        return min;
    else if (parseInt(value) > max)
        return max;
    else
        return value;
}

function getUserName(inputData){
 $.ajax({
    url: "http://localhost/seu/student/getStudent/"+inputData.value,
    type: "GET",
    dataType: "json",
    success: function (data) {
        var res = inputData.id.split("memberID");
        if(data){
            document.getElementById('memberName'+res[1]).value = data.user_name;
        }else{
            document.getElementById('memberName'+res[1]).value = 'Member Does Not Exist';
            document.getElementById(inputData.id).value = "";
            document.getElementById('memberName'+res[1]).value = "";
        }
    },
    error: function (data) {
        console.log(data);
    }
});   
}
function GetProjectMembers(inputData){
 $.ajax({
    url: "http://localhost/seu/student/getAllProjectMembers/",
    type: "GET",
    dataType: "json",
    success: function (data) {
        var res = inputData.id.split("memberID");
        data.forEach(function(memberID){
            if(memberID['member_id'] == inputData.value){
                 document.getElementById(inputData.id).value = "";
                alert('Sorry You Could not register on more than one project');
                document.getElementById('memberName'+res[1]).value = "";
            }            
        });
    },
    error: function (data) {
        console.log(data);
    }
});   
}