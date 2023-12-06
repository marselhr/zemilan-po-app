<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row align-items-center g-0 border-top py-2">
            <!-- Desc -->
            <div class="col-md-6 col-12 text-center text-md-start">
                <span>© <span id="copyright">
                        <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                        </script>
                    </span>Hak Cipta Zemilan. </span>
            </div>
            <!-- Links -->
            <div class="col-12 col-md-6">
                <nav class="nav nav-footer justify-content-center justify-content-md-end">
                    <a class="nav-link active ps-0" href="#">Privasi</a>
                    <a class="nav-link" href="{{ route('syarat') }}">Syarat & Ketentuan</a>
                    <a class="nav-link" href="{{ route('masukan') }}">Masukan</a>
                    <a class="nav-link" href="#">Dukungan</a>
                </nav>
            </div>
        </div>
    </div>
</footer>
