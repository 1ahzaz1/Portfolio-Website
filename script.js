document.addEventListener('DOMContentLoaded', function () {
    const monthSelect = document.getElementById('month-select');
    const blogPosts = document.querySelectorAll('.blog-post-box');
  
    function filterPostsByMonth() {
      const selectedMonth = parseInt(monthSelect.value);
      blogPosts.forEach((post) => {
        const postDate = new Date(post.querySelector('.post-date').textContent);
        if (isNaN(selectedMonth) || postDate.getMonth() + 1 === selectedMonth) {
          post.style.display = 'block';
        } else {
          post.style.display = 'none';
        }
      });
    }
  
    if (monthSelect) {
      monthSelect.addEventListener('change', filterPostsByMonth);
    }
  });
  