// define main functions, call back functions and fetch function here


// ********************** reusable functions **********************
    // refresh table data everytime new data is added on the table
    function dtDestroy(table, tbody) {
        $('#' + table).DataTable().destroy();
        $('#' + tbody).empty();
    }
    // mustache function
    const mustacheTemplating = (container,template,data) =>{
        const $container = container;
        const $template = template.html();  
        
        $container.append(Mustache.render($template, data)); 
    }
    // call the basic overlay modal
    const globalmodal = (title,modalname) =>{
        modalname.modal("show");
        modalname.find('.modaltitle').text(title);
    }
    const asyncget = (url,callback,errcallback) => {
        $.get(url)
        .done(response => callback(response))
        .fail(error => errcallback(error));
    }
    function postData(data, url) {
        return new Promise((resolve, reject) => {
          $.ajax({
            url: url,
            method: "POST",
            type: 'POST',
            contentType: 'application/json',
            timeout: 0,
            data: data,
            success: function(response) {
              resolve(response.message);
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
    function putData(data, url) {
        return new Promise((resolve, reject) => {
          $.ajax({
            url: url,
            method: "PUT",
            type: 'PUT',
            contentType: 'application/json',
            timeout: 0,
            // data: JSON.stringify(data),
            data: data,
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
    function deleteData(data,url) {
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
    function putDataSecondary(data, url) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: url,
            method: 'POST',
            contentType: 'application/json',
            headers: {
            'X-HTTP-Method-Override': 'PUT'
            },
            data: data,
            success: function(response) {
            resolve(response.message);
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
    function ajaxpostImg(data,url){    
         return new Promise((resolve, reject) => {
            $.ajax({
              url: url,
              method: "POST",
              processData: false,
              mimeType: "multipart/form-data",
              contentType: false,
              data: data,
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
// ***************************** end *********************************