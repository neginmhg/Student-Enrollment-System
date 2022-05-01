function classesInSemester(){
    var sem = document.getElementById("sem");
    var semVal = sem.value;
    var form=new FormData();
    form.append("semester",semVal);
    $.ajax({
            url:"../class/calculateClass.php",
            method:"post",
            processData: false,
            contentType: false,
            cache: false,
            data: form,
            dataType: 'json',
            enctype: 'multipart/form-data',
            success:function(response){
                document.getElementById("result").innerHTML="Result : "+response.data;
                }
        });
}
     