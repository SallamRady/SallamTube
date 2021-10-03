<footer class="footer footer-black  footer-white ">
    <div class="container">
        <div class="row">
            <nav class="float-left">
                <ul>
                    @foreach($pages as $page)
                        <li>
                            <a href="{{ route('show_page',$page->id) }}" style="color: #0b1011">
                                {{ $page->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <div class="credits ml-auto">
            <span class="copyright">
              ©
              <script>
                document.write(new Date().getFullYear())
              </script>, made with <i class="fa fa-heart heart"></i> by Sallam Rady
            </span>
            </div>
        </div>
    </div>
</footer>
