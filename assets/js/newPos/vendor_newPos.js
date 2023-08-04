// define main functions, call back functions and fetch function here


// ********************** reusable functions **********************
    const asyncgetVendor = (url,callback,errcallback) => {
        $.get(url)
        .done(response => callback(JSON.parse(response)))
        .fail(error => errcallback(error));
    }
    const getPromise = (url) => {
      return new Promise((resolve, reject) => {
        // const encodedUrl = encodeURIComponent(url);
        $.ajax({
          url: url,
          dataType: "json",
          contentType: "application/json",
          success: function (response) {
            resolve(response);
          },
          error: function (xhr, textStatus, errorThrown) {
            reject(xhr.responseText);
          },
        });
      });
    };
    const postDataVendor = (data, url) => {
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
    const putDataVendor = (data, url) => {
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
    const deleteDataVendor = (data,url) => {
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
    const ajaxpostImgVendor = (data,url) =>{    
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
const errCallback = (error)=>{
  console.log(error)
}

const cb_categoryListVedor = (response)=>{
  const{success,data,error} = response;
  const template = $('#categoryTemplate')
  const container = $('#categoryContainer');

  data.forEach(d => {
    const newData = {name:d.categoryName,id:d.categoryId}
    renderTemp(container,template,newData);
  });
}


const cb_itemListVendor = (response)=>{
  
}