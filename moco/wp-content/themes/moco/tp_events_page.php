<?php
/*
  Template Name: Events Page
 */
session_start();

get_header();
?>

<main class="row main-moco">
    <ul id="events-nav">
        <li>
            <a data-target="1-1-2016" href="#" class="scroll_sec">
                1st Jan<br />
                2016
                <div class="tooltip" title="This is my div's tooltip message!"> 
                    This div has a tooltip when you hover over it!
                </div>
            </a>
        </li>
        <li>
            <a data-target="16-1-2016" href="#" class="scroll_sec">
                16th Jan<br />
                2016
                <div class="tooltip" title="This is my div's tooltip message!"> 
                    This div has a tooltip when you hover over it!
                </div>
            </a>
        </li>
        <li>
            <a data-target="4-6-2016" href="#" class="scroll_sec">
                4th Jun<br />
                2016
                <div class="tooltip" title="This is my div's tooltip message!"> 
                    This div has a tooltip when you hover over it!
                </div>
            </a>
        </li>
        <li>
            <a data-target="21-6-2016" href="#" class="scroll_sec">
                21st Jun<br />
                2016
                <div class="tooltip" title="This is my div's tooltip message!"> 
                    This div has a tooltip when you hover over it!
                </div>
            </a>
        </li>
        <li>
            <a data-target="6-8-2016" href="#" class="scroll_sec">
                6th Aug<br />
                2016
                <div class="tooltip" title="This is my div's tooltip message!"> 
                    This div has a tooltip when you hover over it!
                </div>
            </a>
        </li>
        <li>
            <a data-target="10-2016" href="#" class="scroll_sec">
                Oct<br />
                2016
                <div class="tooltip" title="This is my div's tooltip message!"> 
                    This div has a tooltip when you hover over it!
                </div>
            </a>
        </li>
        <li>
            <a data-target="5-11-2016" href="#" class="scroll_sec">
                5th Nov<br />
                2016
                <div class="tooltip" title="This is my div's tooltip message!"> 
                    This div has a tooltip when you hover over it!
                </div>
            </a>
        </li>
        <li>
            <a data-target="27-11-2016" href="#" class="scroll_sec">
                27th Nov<br />
                2016
                <div class="tooltip" title="This is my div's tooltip message!"> 
                    This div has a tooltip when you hover over it!
                </div>
            </a>
        </li>
    </ul>
    <section id="1-1-2016" class="event-block">
        <div class="event_con_left">
            <h2>1st Jan 2016</h2>
            <img src="http://project-demo-server.info/moco/wp-content/uploads/2015/11/chicken-dinner.jpg" alt="image" />
        </div>
        <div class="event_con_right">
            <p>“Ringing in the New Year” – Individuals and Churches will ring in the Bicentennial Year at 12:00 Noon on Friday January 1, 2016.</p>
        </div>
    </section>
    <div class="sec_divider">
        <img src="<?php bloginfo('template_url'); ?>/images/article_separator.png" alt="image">
    </div>
    <section id="16-1-2016" class="event-block">
        <div class="event_con_right">
            <h2>16th Jan 2016</h2>
        </div>
        <div class="event_con_left">
            <p>“Bicentennial Birthday Bash” – Dinner/Dance at Hecker Community Center</p>
        </div>
    </section>
    <div class="sec_divider">
        <img src="<?php bloginfo('template_url'); ?>/images/article_separator.png" alt="image">
    </div>
    <section id="4-6-2016" class="event-block">
        <div class="event_con_left">
            <h2>4th Jun 2016</h2>
        </div>
        <div class="event_con_right">
            <p>“Ceremonial County Board Meeting” – There will be a ceremonial meeting of the County Board at Harrisonville, the first Monroe County seat of Government.</p>
        </div>
    </section>
    <div class="sec_divider">
        <img src="<?php bloginfo('template_url'); ?>/images/article_separator.png" alt="image">
    </div>
    <section id="21-6-2016" class="event-block">
        <div class="event_con_right">
            <h2>21st Jun 2016</h2>
        </div>
        <div class="event_con_left">
            <p>“Bicentennial Plaque Dedication” – Hosted at the County Courthouse during the Porta Westfalica Fest</p>
        </div>
    </section>
    <div class="sec_divider">
        <img src="<?php bloginfo('template_url'); ?>/images/article_separator.png" alt="image">
    </div>
    <section id="6-8-2016" class="event-block">
        <div class="event_con_left">
            <h2>6th Aug 2016</h2>
        </div>
        <div class="event_con_right">
            <p>“Abe Lincoln Day” – The Courthouse grounds will host a commemorative reenactment of the August 25, 1840 political speech given by Lincoln at the Courthouse.  The event will include a Lincoln impersonator, Civil War Band and many other activities.</p>
        </div>
    </section>
    <div class="sec_divider">
        <img src="<?php bloginfo('template_url'); ?>/images/article_separator.png" alt="image">
    </div>
    <section id="10-2016" class="event-block">
        <div class="event_con_right">
            <h2>Oct 2016</h2>
        </div>
        <div class="event_con_left">
            <p>Naturalization Ceremony conducted by the local DAR Chapter.</p>
        </div>
    </section>
    <div class="sec_divider">
        <img src="<?php bloginfo('template_url'); ?>/images/article_separator.png" alt="image">
    </div>
    <section id="5-11-2016" class="event-block">
        <div class="event_con_left">
            <h2>5th Nov 2016</h2>
        </div>
        <div class="event_con_right">
            <p>“Bicentennial Gala” – The closing dinner will be held at Turner Hall in Columbia.</p>
        </div>
    </section>
    <div class="sec_divider">
        <img src="<?php bloginfo('template_url'); ?>/images/article_separator.png" alt="image">
    </div>
    <section id="27-11-2016" class="event-block">
        <div class="event_con_right">
            <h2>27th Nov 2016</h2>
        </div>
        <div class="event_con_left">
            <p>“Bicentennial Time Capsule Dedication” -  The dedication of a time capsule at the base of the Buffalo at the County Courthouse will be held in conjunction with Waterloo Christmas Walk.</p>
        </div>
    </section>
    <?php get_footer(); ?>