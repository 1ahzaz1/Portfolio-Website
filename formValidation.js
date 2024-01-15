document.getElementById('add-post-form').addEventListener('submit', function (event) {
    const title = document.getElementById('title');
    const body = document.getElementById('body');
    let hasError = false;
  
    if (title.value.trim() === '') {
      title.classList.add('error');
      document.getElementById('title-error').style.display = 'block';
      hasError = true;
    } else {
      title.classList.remove('error');
      document.getElementById('title-error').style.display = 'none';
    }
  
    if (body.value.trim() === '') {
      body.classList.add('error');
      document.getElementById('body-error').style.display = 'block';
      hasError = true;
    } else {
      body.classList.remove('error');
      document.getElementById('body-error').style.display = 'none';
    }
  
    if (hasError) {
      event.preventDefault();
    }
  });
  