// Add Replay Form
$('.replay').click(function(){
    // check If there is one Replay Form For One Comment 
    
    if($(this).parents('.comment').find('form').length == 0){

        $(this).parents('.comment').append(
            ` <!-- Add Comment -->
            <form class="py-4">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group btn-light rounded-10">
                            <textarea class="form-control bg-transparent rounded-10"
                                placeholder="اكتب تعليقك" rows="5"></textarea>
    
                        </div>
                        
                    </div>
                    <div class="col-lg-2">
                        <button
                            class="btn bg-secondary-color w-100 text-white px-5 rounded-10">رد</button>
                    </div>
                </div>
            </form>
            <!-- ./Add Comment -->
            `
        )
    }
})