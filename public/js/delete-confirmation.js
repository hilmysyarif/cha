$("#delete-confirmation").on("show.bs.modal",function(t){button=$(t.relatedTarget),$(this).find("form").attr("action",delete_url+button.data("id"))});