<template>
    <div>
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <div class="inner-heading">
                            <h2>Home</h2>
                        </div>
                    </div>
                    <div class="span8">
                        <ul class="breadcrumb">
                            <li><router-link :to="{name: 'home-public'}"><i class="icon-home"></i></router-link><i class="icon-angle-right"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="callaction">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="big-cta">
                            <div class="cta-text">
                                <h3>We've created more than <span class="highlight"><strong>5000 websites</strong></span> this year!</h3>
                            </div>
                            <div class="cta floatright">
                                <router-link class="btn btn-large btn-theme btn-rounded" :to="{name: 'contact'}">Contact Us</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="row">
                            <div class="span3">
                                <div class="box aligncenter">
                                    <div class="aligncenter icon">
                                        <i class="icon-briefcase icon-circled icon-64 active"></i>
                                    </div>
                                    <div class="text">
                                        <h6>Corporate business</h6>
                                        <p>
                                            Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                                        </p>
                                        <a href="#">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="box aligncenter">
                                    <div class="aligncenter icon">
                                        <i class="icon-desktop icon-circled icon-64 active"></i>
                                    </div>
                                    <div class="text">
                                        <h6>Responsive theme</h6>
                                        <p>
                                            Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                                        </p>
                                        <a href="#">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="box aligncenter">
                                    <div class="aligncenter icon">
                                        <i class="icon-beaker icon-circled icon-64 active"></i>
                                    </div>
                                    <div class="text">
                                        <h6>Coded carefully</h6>
                                        <p>
                                            Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                                        </p>
                                        <a href="#">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="box aligncenter">
                                    <div class="aligncenter icon">
                                        <i class="icon-coffee icon-circled icon-64 active"></i>
                                    </div>
                                    <div class="text">
                                        <h6>Sit and enjoy</h6>
                                        <p>
                                            Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                                        </p>
                                        <p>Learn more</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "index"
}
</script>

<style scoped>

</style>
