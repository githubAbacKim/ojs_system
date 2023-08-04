
const hideShowEleDom = () =>{
    if(showEleArr!= null){
        $.each(showEleArr,(i,d) =>{
        d.fadeIn(800).removeClass('d-none').show();
        })
    }

    if(hideEleArr != null){
        $.each(hideEleArr,(i,d) =>{
        d.hide().addClass('d-none');
        })
    }
}

const basicHideShowEleDom = () =>{
    if(showEleArr!= null){
        $.each(showEleArr,(i,d) =>{
        d.removeClass('d-none').show();
        })
    }

    if(hideEleArr != null){
        $.each(hideEleArr,(i,d) =>{
        d.hide().addClass('d-none');
        })
    }
}
// refresh table data everytime new data is added on the table
function dtDestroy(table, tbody) {
    $('#' + table).DataTable().destroy();
    $('#' + tbody).empty();
}
// mustache function
const renderTemp = (container,template,data) =>{
    const $container = container;
    const $template = template.html();  
    
    $container.append(Mustache.render($template, data)); 
}
// call the basic overlay modal
const globalmodal = (title,modalname) =>{
    modalname.modal("show");
    modalname.find('.modaltitle').text(title);
}

const categoryList = () =>{

}

const showItemsSelection = () =>{

}

const searchItemSelection = () =>{

}

const showCartItem = () => {
    
}