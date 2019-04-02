<template>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html" class="logo"><img src="/images/logo-alt.png" alt=""></a>
                        </div>
                        <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
                        <ul class="contact-social">
                            <li><a href="#" class="social-facebook"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" class="social-twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="social-instagram"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget">
                        <h3 class="footer-title">Genres</h3>
                        <div class="category-widget">
                            <ul>
                                <li><a href="#">Lifestyle <span>451</span></a></li>
                                <li><a href="#">Fashion <span>230</span></a></li>
                                <li><a href="#">Technology <span>40</span></a></li>
                                <li><a href="#">Travel <span>38</span></a></li>
                                <li><a href="#">Health <span>24</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget">
                        <h3 class="footer-title">Topics</h3>
                        <div class="tags-widget">
                            <ul>
                                <li><a href="#">Social</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Life</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Magazine</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Health</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget">
                        <h3 class="footer-title">Newsletter</h3>
                        <div class="newsletter-widget">
                            <form>
                                <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
                                <input class="input" name="newsletter" placeholder="Enter Your Email">
                                <button class="primary-button">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom row">
                <div class="col-md-6 col-md-push-6">
                    <ul class="footer-nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contacts</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-md-pull-6">
                    <div class="footer-copyright">
                        Copyright &copy; {{ new Date().getFullYear() }} All rights reserved
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'web-footer',
        data() {
            return {}
        },
        computed: {
            ...mapGetters({})
        },
        methods: {
            ...mapActions({})
        }
    }
</script>

<style scoped>

</style>