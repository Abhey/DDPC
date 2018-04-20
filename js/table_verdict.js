/**
 * Created by Family on 4/20/2018.
 */


//rows of table need to have id = "#stu_rows'

    $("#stu_rows").click(function () {
        var stipend_id = $(this).find("input[type='hidden']").val();
        window.location.assign(details_url+"?stipend_id=" + stipend_id);
    });

    function make_green(obj)
    {
        $(obj).hide();
        $(obj).siblings().filter("input[name='submit-no']").show();
        $(obj).parents("tr").css({"background-color": 'lightgreen'});
        $(obj).parents("td").css("padding-left", "80px");
    }

    function make_red(obj)
    {
        $(obj).hide();
        $(obj).siblings().filter("input[name='submit-yes']").show();
        $(obj).parents("tr").css({"background-color": 'lightsalmon'});
        $(obj).parents("td").css("padding-left", "80px");
    }

    $("input[name='submit-yes']").click(function (e) {

        var stipend_id = $(this).siblings().filter("input[type='hidden']").val();
        e.stopPropagation();

        //making it invisible and green by passing the approve button
        make_green(this);

        //sending an ajax request to approve it
        $.post(ajax_request_url,
            {
                'verdict': "approve",
                'stipend_id': stipend_id,
                'is_single': true

            }, function (data, status) {
                if (data.trim() != '')
                    alert(data);
            })


    });

    $("input[name='submit-no']").click(function (e) {

        var stipend_id = $(this).siblings().filter("input[type='hidden']").val();
        e.stopPropagation();

        //making it invisible and red
       make_red(this);

        //sending an ajax request to decline it
        $.post(ajax_request_url,
            {
                'verdict': "decline",
                'stipend_id': stipend_id,
                'is_single': true

            }, function (data, status) {
                if (data.trim() != '')
                    alert(data);
            })

    });


    $("#approve_all").click(function(){
        $("tbody tr").find("input[type='hidden']").each(function(index,stipend){
                //getting stipend and change ui
                var stipend_id = $(stipend).val();

                make_green($(stipend).siblings("input[name='submit-yes']"));
                //console.log($(stipend).siblings("input[name='submit-yes']"));
                //sending ajax request
                $.post(ajax_request_url,
                {
                    'verdict': "approve",
                    'stipend_id': stipend_id,
                    'is_single': true

                }, function (data, status) {
                    if (data.trim() != '')
                        alert(data);
                })
        });

    });

$("#decline_all").click(function(){
    $("tbody tr").find("input[type='hidden']").each(function(index,stipend){
        //getting stipend and change ui
        var stipend_id = $(stipend).val();

        make_red($(stipend).siblings("input[name='submit-no']"));
        //console.log($(stipend).siblings("input[name='submit-yes']"));
        //sending ajax request
        $.post(ajax_request_url,
        {
            'verdict': "decline",
            'stipend_id': stipend_id,
            'is_single': true

        }, function (data, status) {
            if (data.trim() != '')
                alert(data);
        })
    });

});