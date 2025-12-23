<x-head></x-head>

<body class="font-poppins bg-white scroll-smooth">

    <x-nav-bar></x-nav-bar>
    <x-main.home />


    <script>
        if (window.location.hash) {
            const el = document.querySelector(window.location.hash);
            if (el) {
                el.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    </script>

    <script>
        document.addEventListener('click', function(e) {
            const link = e.target.closest('.pagination a');
            if (!link) return;

            e.preventDefault(); // ⛔ STOP reload halaman

            fetch(link.href, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('blog-content').innerHTML = html;

                    // scroll ke blog
                    document.getElementById('blog').scrollIntoView({
                        behavior: 'smooth'
                    });

                    // ganti URL TANPA reload
                    history.pushState(null, '', link.href);
                });
        });
    </script>

    <script>
        if (location.hash === '#blog') {
            document.getElementById('blog').scrollIntoView();
        }
    </script>
</body>
