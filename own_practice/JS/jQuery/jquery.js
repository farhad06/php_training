$(document).ready(function(){
    //get attribute
    // let a=$("#d1 p").html()
    // console.log(a)

    // let b=$("body p").text()
    // console.log(b)

    // let att=$("body").attr('id');
    // console.log(att);

    // $('#sform').submit(function(){
    //     let name=$("#name").val();
    //     let phone=$("#phone").val();
    //      console.log("Name is: " +name+" and phone number is: "+phone);
    //      console.log(name);
    //     alert("Hello "+ name + phone)
    // });

    $('#d1').on({
        "click":function(){
            $(this).css("background-color","red")

        },
        "mouseleave":function(){
            $(this).css("background-color","pink")
        },
        "mouseenter":function(){
            $(this).css("background-color","orange")
        }

    });

    $("#ebtn").click(function(){
        $("#box").empty() // it removes all the content of the div

    });
    $("#rbtn").click(function(){
        $("#box").remove() // it remove the div

    });
    $("#clone").click(function(){
        $("#box h3").clone().prependTo("#box2-h3")

    });

    //wrap and unwrap
    $("#wrap").click(function(){
        $("#box2").wrap("<h2></h2>")

    });
    $("#unwrap").click(function(){
        $("#box2").unwrap()

    });
});