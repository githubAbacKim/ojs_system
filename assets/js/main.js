const asyncget = (url,callback,errcallback) => {
    $.get(url)
    .done(response => callback(response))
    .fail(error => errcallback(error));
}
/* 
    // sample implementation
    asyncget(url, cb_massageTable);
*/

/* const getData = url =>{
    var tmp;
    $.ajax({
        url:url,
        type: 'GET',
        dataType: 'json',
        async: false,
        success: function (results) {
            tmp = results;
        },
        error: function (xhr, status, error) {
            console.log(error);
        },
    });

    return tmp;
} */

const getData = (data,url) => {
    return new Promise((resolve, reject) => {
        $.ajax({
            url:url,
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(response) {
                resolve(response);
            },
            error: function(xhr, status, error) {
                console.log('error:', error);
                console.log('status:', status)
                console.log('xhr:', xhr)
                reject(error);
            },
        });
      });
}

const postData = (data, url) => {
    return new Promise((resolve, reject) => {
      $.ajax({
        type:'ajax',
        method: 'post',
        url: url,
        data: data,
        async: false,
        dataType: 'json',
        success: function(response) {
          resolve(response);
        },
        error: function(xhr, status, error) {
          console.log('error:', error);
          console.log('status:', status)
          console.log('xhr:', xhr)
          reject(error);
        },
      });
    });
}

/*  
    // sample implementation

    shopData = JSON.stringify(data);
    postData(shopData, postUrl)
    .then((responseMessage) => {
        const url  = `http://210.99.223.38:13405/api/shop/list/${pageNum}/${limit}`;
        asyncget(url, cb_massageTable);
        clearFormDataHandler();
    })
    .catch((error) => {
        console.log(error);
    });
*/

const deleteData = (data,url) => {
    return new Promise((resolve, reject) => {
      $.ajax({
        url: url,
        method: "DELETE",
        type: "DELETE",
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
          resolve(response.message);
        },
        error: function (xhr, status, error) {
          reject(error);
        },
      });
    });
}

/* 
    // sample implementation

    deleteData(data, url)
    .then(function(response) {
        selectAllCheckBox.checked=false;
        const url  = `http://210.99.223.38:13405/api/shop/list/${pageNum}/${limit}`;
        asyncget(url, cb_massageTable);   
    })
    .catch(function(error) {
        console.log("Request failed: " + error);
    }); 
*/

const errorCallbackVendor = (error) =>{
    // const modalData = {
    //     message:error
    // }
    // const title = 'Alert Message!';
    // globalmodal (title,modal);
    // modalContainer.empty();
    // mustacheTemplating(modalContainer,alertTemplate,modalData);
    console.log(error)
}

const renderTemplate = (container,template,data) =>{
    const $container = container;
    const $template = template.html();  
    
    $container.append(Mustache.render($template, data)); 
}

// call the basic overlay modal
const globalmodalVendor = (title,modalname) =>{
    modalname.modal("show");
    modalname.find('.modaltitle').text(title);
}