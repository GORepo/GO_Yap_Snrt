        <!--**************PORTFOLIO**************-->
        	<section id="portfolio" class="main-page-min-height">
              <figure class="featured"><img src="/images/icons/featured-label.png" width="282" height="269" alt="" /></figure>
              <figure class="back-items"></figure>
              
                <div style="padding-left:100px">
            	<span style="position:relative;">

                    {section name=rows loop=$activities }
                {assign var="event" value=$activities[rows]->events}
                        <b style="font-size:18px">{$activities[rows]->title}</b><br><br>
                         {foreach from=$event item=foo}
                       <b style="font-size:14px">{$foo.date}-{$foo.scene}</b><br> 

                          {/foreach}
<br>
                    {/section}

                </span>
</div>
        <!--  ((((((((((((((((
                <div id="pagination">
                	<span id="arrow-left" class="arrow"><a href="#" title="SEO KEYWORDS">&larr;&nbsp;geri</a></span>
                    <span id="arrow-right" class="arrow"><a href="#" title="SEO KEYWORDS">ileri&nbsp;&rarr;</a></span>
                </div>-->
            </section><!-- end section -->


        <script src="js/index.js"></script>
        