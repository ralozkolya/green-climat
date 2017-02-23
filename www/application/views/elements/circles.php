<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="900" height="712" viewBox="0 0 941 744">
<defs>
    <style>
      .circle {
        fill: white;
        stroke-width: 8px;
        stroke: url(#green);
        filter: url(#shadow);
      }
      .path {
        fill: none;
        stroke-width: 8px;
        stroke: url(#yellow);  
      }
      .middle {
        fill: none;
        stroke-width: 8px;
        stroke: url(#yellow);  
      }
      .green-half {
        fill: url(#green);
        stroke: none;
        color: white;
      }
      .white-half {
        fill: white;
        stroke: none;
        filter: url(#shadow);
      }
    </style>
    <linearGradient id="green" x1="0%" y1="50%" x2="100%" y2="50%">
      <stop offset="0" stop-color="#7dd579"/>
      <stop offset="1" stop-color="#2cba42"/>
    </linearGradient>
    <linearGradient id="yellow" x1="0%" y1="50%" x2="100%" y2="50%">
      <stop offset="0" stop-color="#b1b1b1"/>
      <stop offset="1" stop-color="#f1c40f"/>
    </linearGradient>
    <filter id="shadow" width="100" height="100">
      <feOffset result="offOut" in="SourceAlpha" dx="0" dy="1" />
      <feFlood result="flood" flood-opacity="0.3"/>
      <feGaussianBlur result="blurOut" in="offOut" stdDeviation="2" />
      <feBlend in="SourceGraphic" in2="blurOut" mode="normal" />
    </filter>
  </defs>
  <path class="path" d="M100,147
    A390,400 0 1,0 840,147"/>
  <?php foreach($categories as $i => $c): ?>
    <?php
      $a = M_PI / 4  * $i - M_PI / 8;
      $x = 400 * cos($a) + 470;
      $y = 400 * sin($a) + 260;
    ?>
    <g transform="<?php echo "translate({$x}, {$y})" ?>">
      <circle class="circle" r="95" />
      <text class="circle-text" dy="12" text-anchor="middle"><?php echo $c; ?></text> 
    </g>
  <?php endforeach; ?>
  <g transform="translate(470,260)">
    <path class="green-half" d="M0,-250
    A250,250 0 1,0 0,250" />
    <foreignObject width="200" height="280" x="-210" y="-140">
      <div class="content-text">
        <div><?php echo $page->body; ?></div>
      </div>
    </foreignObject>
    <path class="white-half" d="M0,-250
    A250,250 0 1,1 0,250" />
    <foreignObject width="220" height="280" x="10" y="-140">
      <div class="content-text">
        <div>
          <img alt="Logo" src="<?php echo static_url('img/logo.png'); ?>">
        </div>
        <div class="green">
           <div><?php echo lang('heating_cooling'); ?></div>
           <div><a href="<?php echo base_url(); ?>" class="unstyled">www.greenclimat.com</a></div>
           <div><a href="<?php echo 'mailto:'.INFO_MAIL; ?>" class="unstyled"><?php echo INFO_MAIL; ?></a></div>
        </div>
      </div>
    </foreignObject>
    <circle class="middle" r="250" />
  </g>
</svg>