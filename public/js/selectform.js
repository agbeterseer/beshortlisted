    $(document).ready(function() {
    $('select[name="region"]').on('change', function() {
        var regionID = $(this).val();
            if(regionID) {
            $.ajax({
                url: '/candidate/update_job_application/'+encodeURI(regionID),
                type: "GET",
                dataType: "json",
                success:function(data) {
                $('select[name="location"]').empty();
                 // $('select[name="location"]').append('<option value="'+ '....select one ....' +'">'+ '......select one ......' +'</option>');
                $.each(data, function(key, value) {
                $.each(value, function(key2, value2){ 

        $('select[name="location"]').append('<option value="'+ value2 +'">'+ value2 +'</option>');
       
                    });
                
        // $('select[name="zemployee_payslip_type"]').append('<option value="'+ value +'">'+ value +'</option>');

                    });

                }
            });
            }else{
            $('select[name="location"]').empty();
              }
           });
        });

    
     
    $(document).ready(function() {
    $('select[name="region"]').on('change', function() {
        var regionID = $(this).val();
            if(regionID) {
            $.ajax({
                url: '/candidate/search/'+encodeURI(regionID),
                type: "GET",
                dataType: "json",
                success:function(data) {
                $('select[name="location"]').empty();
                 // $('select[name="location"]').append('<option value="'+ '....select one ....' +'">'+ '......select one ......' +'</option>');
                $.each(data, function(key, value) {
                $.each(value, function(key2, value2){ 

        $('select[name="location"]').append('<option value="'+ value2 +'">'+ value2 +'</option>');
       
                    });
                
        // $('select[name="zemployee_payslip_type"]').append('<option value="'+ value +'">'+ value +'</option>');

                    });

                }
            });
            }else{
            $('select[name="location"]').empty();
              }
           });
        });

    $(document).ready(function() {
    $('select[name="region"]').on('change', function() {
        var regionID = $(this).val();
            if(regionID) {
            $.ajax({
                url: '/employer/city-region-search/'+encodeURI(regionID),
                type: "GET",
                dataType: "json",
                success:function(data) {
                $('select[name="location"]').empty();
                 // $('select[name="location"]').append('<option value="'+ '....select one ....' +'">'+ '......select one ......' +'</option>');
                $.each(data, function(key, value) {
                $.each(value, function(key2, value2){ 

        $('select[name="location"]').append('<option value="'+ value2 +'">'+ value2 +'</option>');
       
                    });
                
        // $('select[name="zemployee_payslip_type"]').append('<option value="'+ value +'">'+ value +'</option>');

                    });

                }
            });
            }else{
            $('select[name="location"]').empty();
              }
           });
        });


    $(document).ready(function() {
    $('select[name="region"]').on('change', function() {
        var regionID = $(this).val();
            if(regionID) {
            $.ajax({
                url: '/employer/post-jobs/'+encodeURI(regionID),
                type: "GET",
                dataType: "json",
                success:function(data) {
                $('select[name="location"]').empty();
                 // $('select[name="location"]').append('<option value="'+ '....select one ....' +'">'+ '......select one ......' +'</option>');
                $.each(data, function(key, value) {
                $.each(value, function(key2, value2){ 

        $('select[name="location"]').append('<option value="'+ value2 +'">'+ value2 +'</option>');
       
                    });
                
        // $('select[name="zemployee_payslip_type"]').append('<option value="'+ value +'">'+ value +'</option>');

                    });

                }
            });
            }else{
            $('select[name="location"]').empty();
              }
           });
        });
