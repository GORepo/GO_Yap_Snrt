        <!--**************PORTFOLIO**************-->
        	<section id="portfolio" >
              <figure class="featured"><img src="/images/icons/featured-label.png" width="282" height="269" alt="" /></figure>
              <figure class="back-items"></figure>
              <nav>
                  <ul id="nav-works" class="works-filters">
                    <li id="nav-first-child">filtrele&nbsp;&rarr;</li>
                    <li class="fade-option all"><a class="current" href="#all" title="hepsi">hepsi</a></li>
                    <li class="fade-option tiyatro"><a href="#theater" title="tiyatro">tiyatro</a></li>
                    <li class="fade-option concert"><a href="#concert" title="konser">konser</a></li>
                    <li class="fade-option event"><a href="#event" title="etkinlik">etkinlik</a></li>
                    <li class="fade-option private"><a href="#special" title="ozel">ozel</a></li>
                    <li class="fade-option other"><a href="#other" title="diger">diger</a></li>
                  </ul>
                </nav>


            	<ul id="list-works" >
                {section name=rows loop=$activities }
                {assign var="image" value=$activities[rows]->images[0]}
                	<li class="work-item
                	{if $activities[rows]->category eq '1'}
                            theater
                    {elseif $activities[rows]->category eq '2'}
                            concert
                    {elseif $activities[rows]->category eq '3'}
                            event
                    {elseif $activities[rows]->category eq '4'}
                            special
                    {elseif $activities[rows]->category eq '5'}
                            other
                    {/if}

                	" id="{$activities[rows]->category}">
                    	<figure><a href="#" title="{$activities[rows]->title}"><img src="/activities/thumbs/{$image->path}"  height="160" alt="{$activities[rows]->title}" /></a></figure>
                        <div class="work-caption">
                        	<h3><a class="caption-title" href="/detail.php?id={$activities[rows]->id}" rel="graphic-gallery" title="sanArt yapım">{$activities[rows]->title}</a></h3>
                            <span class="description">{$activities[rows]->description}</span>
                            <span class="year">&sdot;{$activities[rows]->date}&sdot;</span>
                            <span class="type">&sdot;
                            {if $activities[rows]->category eq '1'}
                                tiyatro
                            {elseif $activities[rows]->category eq '2'}
                                konser
                            {elseif $activities[rows]->category eq '3'}
                                etkinlik
                            {elseif $activities[rows]->category eq '4'}
                                ozel
                            {elseif $activities[rows]->category eq '5'}
                                diger
                            {/if}

                            &sdot;</span>
                            <span class="magnify"><a href="/detail.php?id={$activities[rows]->id}" class="single" title="sanArt yapım">detay</a></span>
                        </div>
                    </li>
                {/section}
                </ul>

        <!--  ((((((((((((((((
                <div id="pagination">
                	<span id="arrow-left" class="arrow"><a href="#" title="SEO KEYWORDS">&larr;&nbsp;geri</a></span>
                    <span id="arrow-right" class="arrow"><a href="#" title="SEO KEYWORDS">ileri&nbsp;&rarr;</a></span>
                </div>-->
            </section><!-- end section -->


        <script src="js/index.js"></script>
        