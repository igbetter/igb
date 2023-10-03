<?php
  $termCategories = get_terms(array('taxonomy' => 'term-category', 'hide_empty' => true, 'exclude' => '152'));
  $defaultCategoryTerms = array();

  foreach($termCategories as $term) {
    $defaultCategoryTerms = array_merge($defaultCategoryTerms, array($term->slug));
  }

  $defaultSort = 'title';
  $defaultPostType = array('video', 'post');
  $postTypeConvert = array('blog' => 'post', 'video' => 'video');
  $tempPostType = array();
  $postType = array();


  if(isset($_GET['postType'])) {
    if(str_contains($_GET['postType'], '[') && str_contains($_GET['postType'], ']')) {
      foreach(json_decode(str_replace('\"', '"', $_GET['postType']), true) as $type) {
        $postType = array_merge($postType, array($postTypeConvert[$type]));
      }
    }
    else {
      $postType =  array($postTypeConvert[$_GET['postType']]);
    }
  }
  else {
    $postType = $defaultPostType;
  }

  $sort = isset($_GET['sort']) ? $_GET['sort'] : $defaultSort;
  $glossaryTermParam = isset($_GET['glossaryTerm']) ? json_decode(str_replace('\"', '"', $_GET['glossaryTerm']), true) : array();
  $termCategory = isset($_GET['termCategory']) ? json_decode(str_replace('\"', '"', $_GET['termCategory']), true) : $defaultCategoryTerms;
  $term = isset($_GET['term']) ? $_GET['term'] : null;


  $allTermsResults = get_posts(it_gets_better_query_glossary_by_term_category_slug($defaultCategoryTerms));

  $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

  $countQuery =  array(
    'post_type' => $postType,
    'orderby' => $defaultSort,
    'order' => $order,
    'status' => 'published'
  );

  $queryArgs = array(
    'post_type' => $postType,
    'orderby'   => $defaultSort,
    'order' => "asc",
    'status'    => 'published',
    'posts_per_page' => 18,
    'paged' => $paged,
  );

  if($sort !== $defaultSort) {
    $queryArgs = array_merge(
      $queryArgs, array(
        "orderby" => "date",
        "order" => $sort === "latest" ? "desc" : "asc"
      )
    );
  }


  if($term) {
    $queryArgs = array_merge(
      $queryArgs, array('s' => $term)
    );

    $countQuery = array_merge(
      $countQuery, array('s' => $term)
    );
  }

  if(count($glossaryTermParam) > 0) {
    $metaQueryArray = array("relation" => "OR");

    foreach($glossaryTermParam as $term) {
      $metaQueryArray = array_merge(
        $metaQueryArray, array(
          array(
            'key' => 'associated_glossary_terms',
            'value' => $term,
            'compare' => 'LIKE'
          )
        )
      );
    }

    $queryArgs = array_merge(
      $queryArgs, array(
        'meta_query' => array($metaQueryArray)
      )
    );

    $countQuery = array_merge(
      $countQuery, array(
        'meta_query' => array($metaQueryArray)
      )
    );
  }

  $countResult = new WP_Query($countQuery);
  $totalCount = $countResult->found_posts;
  wp_reset_postdata();

  $results = new WP_Query($queryArgs);

  $checkboxElement = '<span class="checkbox-check" style="background-color: %s"></span>%s<span class="checkbox-border" style="border-color: %s"></span>';


  $sortOptions = array(
    array("value" => "title", "label" => "Title"),
    array("value" => "latest", "label" => "Date (latest to oldest)"),
    array("value" => "oldest", "label" => "Date (oldest to latest)")
  );

  $sortOptionTemplate = '<option value="%s" %s>%s</option>';
?>

<section class="browse-content-section alignfull mt-7">
  <div class="block lg:hidden px-default py-4">
    <button class="wp-block-button__link wp-element-button" id="openMobileFilter">
      Show Filters
    </button>
  </div>
  <div class="px-default mobile-filter">
    <div class="header">
      <button class="close-filter">✕</button>
      <h2 class="mb-0">Sort and Filter</h2>
      <button class="reset-query">Reset</button>
    </div>
    <div class="filters filter-wrapper">
      <div class="filter-container">
        <div class="selector">
          <select name="sortResults" id="" value="<?php echo $sort; ?>">
            <?php
              foreach($sortOptions as $option) {
                echo sprintf($sortOptionTemplate, $option['value'], $option['value'] === $sort ? 'selected' : '', $option['label']);
              }
            ?>
          </select>
          <svg width="19" height="10" viewBox="0 0 19 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.1993 9.31514C9.81058 9.69571 9.18893 9.69571 8.8002 9.31514L1.29185 1.96458C0.651562 1.33775 1.09537 0.25 1.9914 0.25L17.0081 0.250002C17.9041 0.250002 18.348 1.33775 17.7077 1.96458L10.1993 9.31514Z" fill="#F2566E"/>
          </svg>
        </div>
      </div>
      <div class="filter-container">
        <p class="mb-4 font-bold">Term Categories</p>
        <?php if($termCategories): ?>
          <ul class="terms">
            <?php foreach($termCategories as $term): ?>
              <?php
                $id = $term->term_id;
                $slug = $term->slug;
                $name = $term->name;
                $color = get_field('button_color', $term) ? get_field('button_color', $term) : "#292929";
              ?>
              <li>
                <label class="checkbox" htmlFor="#termCategory-<?php echo $slug; ?>">
                  <input
                    name="termCategory"
                    type="checkbox"
                    value="<?php echo $slug; ?>"
                    id="termCategory-<?php echo $slug; ?>"
                    data-color="<?php echo $color; ?>"
                    <?php echo in_array($slug, $termCategory) ? "checked" : ""; ?>
                  />
                  <?php echo sprintf($checkboxElement, $color, $name, $color);?>
                </label>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
      <div class="filter-container">
        <p>Post Type</p>
        <ul class="terms">
          <li>
            <label class="checkbox" htmlFor="#postTypeBlogs">
              <input type="checkbox" value="blog" name="postType" id="postTypeBlogs" data-color="#512b67" <?php echo in_array("post", $postType) ? "checked" : ""; ?> />
              <?php echo sprintf($checkboxElement, 'rgb(242, 86, 107)', 'Blogs', 'rgb(242, 86, 107)');?>
            </label>
          </li>
          <li>
            <label class="checkbox" htmlFor="#postTypeVideos">
              <input type="checkbox" value="video" name="postType" id="postTypeVideos" data-color="#f2566b" <?php echo in_array("video", $postType) ? "checked" : ""; ?> />
              <?php echo sprintf($checkboxElement, 'rgb(81, 43, 103)', 'Videos', 'rgb(81, 43, 103)');?>
            </label>
          </li>
        </ul>
      </div>
      <div class="filter-container">
        <p>Glossary Term</p>
        <ul class="terms mb-8">
          <?php foreach( $allTermsResults as $item): ?>
            <?php
              $relatedTermCategory = wp_get_post_terms( $item->ID, 'term-category');
              $termCategoryIds = array();

              foreach($relatedTermCategory as $term) {
                array_push($termCategoryIds,  $term->slug);
              }

              $id = $item->ID;
              $name = $item->post_title;
              $color = get_field('border_color', $id) ? get_field('border_color', $id) : "#292929";
            ?>

            <li style="<?php echo count( array_intersect($termCategoryIds, $termCategory)) <= 0 ? "display:none;" : ""; ?>" >
              <label class="checkbox" htmlFor="<?php echo $slug; ?>">
                <input
                  type="checkbox"
                  name="glossaryTerm"
                  value="<?php echo $id; ?>"
                  id="<?php echo $name; ?>"
                  data-color="<?php echo $color; ?>"
                  data-show="<?php echo join(",", $termCategoryIds); ?>"
                  <?php echo in_array($id, $glossaryTermParam) ? "checked" : ""; ?>
                />
                <?php echo sprintf($checkboxElement, $color, $name, $color); ?>
              </label>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="filter-container">
        <button class="wp-block-button__link wp-element-button submit-query w-full mobile-submit-query">
          Submit
        </button>
      </div>
    </div>
  </div>
  <div class="main-filters px-default hidden lg:block">
    <div class="w-3/4">
      <div class="mb-4">
        <p class="mb-4 font-bold">TERM CATEGORIES</p>
        <?php if($termCategories): ?>
          <ul class="terms">
            <?php foreach($termCategories as $term): ?>
              <?php
                $id = $term->term_id;
                $slug = $term->slug;
                $name = $term->name;
                $color = get_field('button_color', $term) ? get_field('button_color', $term) : "#292929";
              ?>
              <li>
                <label class="checkbox" htmlFor="#termCategory-<?php echo $slug; ?>">
                  <input
                    name="termCategory"
                    type="checkbox"
                    value="<?php echo $slug; ?>"
                    id="termCategory-<?php echo $slug; ?>"
                    data-color="<?php echo $color; ?>"
                    <?php echo in_array($slug, $termCategory) ? "checked" : ""; ?>
                  />
                  <?php echo sprintf($checkboxElement, $color, $name, $color);?>
                </label>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
      <div>
        <p>Post Type</p>
        <ul class="terms">
          <li>
            <label class="checkbox" htmlFor="#postTypeBlogs">
              <input type="checkbox" value="blog" name="postType" id="postTypeBlogs" data-color="#512b67" <?php echo in_array("post", $postType) ? "checked" : ""; ?> />
              <?php echo sprintf($checkboxElement, 'rgb(242, 86, 107)', 'Blogs', 'rgb(242, 86, 107)');?>
            </label>
          </li>
          <li>
            <label class="checkbox" htmlFor="#postTypeVideos">
              <input type="checkbox" value="video" name="postType" id="postTypeVideos" data-color="#f2566b" <?php echo in_array("video", $postType) ? "checked" : ""; ?> />
              <?php echo sprintf($checkboxElement, 'rgb(81, 43, 103)', 'Videos', 'rgb(81, 43, 103)');?>
            </label>
          </li>
        </ul>
      </div>
    </div>
    <div class="w-1/4">
      <div class="selector">
        <select name="sortResults" id="" value="<?php echo $sort; ?>">
          <?php
            foreach($sortOptions as $option) {
              echo sprintf($sortOptionTemplate, $option['value'], $option['value'] === $sort ? 'selected' : '', $option['label']);
            }
          ?>
        </select>
        <svg width="19" height="10" viewBox="0 0 19 10" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M10.1993 9.31514C9.81058 9.69571 9.18893 9.69571 8.8002 9.31514L1.29185 1.96458C0.651562 1.33775 1.09537 0.25 1.9914 0.25L17.0081 0.250002C17.9041 0.250002 18.348 1.33775 17.7077 1.96458L10.1993 9.31514Z" fill="#F2566E"/>
        </svg>
      </div>
    </div>
  </div>
  <div class="px-default">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
      <div class="lg:col-span-1 hidden lg:block">
        <div class="sticky-sidebar">
          <p class="results-count">
            <?php echo $totalCount; ?>
            <?php echo ($postType === "blog") ? "Blog" : ''; ?>
            <?php echo ($postType === "video") ? "Video" : ''; ?>
            Results
          </p>
          <div class="filters desktop-filter">
            <div class="filter-group">
              <ul class="terms mb-8">
                <?php foreach( $allTermsResults as $item): ?>
                  <?php
                    $relatedTermCategory = wp_get_post_terms( $item->ID, 'term-category');
                    $termCategoryIds = array();

                    foreach($relatedTermCategory as $term) {
                      array_push($termCategoryIds,  $term->slug);
                    }

                    $id = $item->ID;
                    $name = $item->post_title;
                    $color = get_field('border_color', $id) ? get_field('border_color', $id) : "#292929";
                  ?>

                  <li style="<?php echo count( array_intersect($termCategoryIds, $termCategory)) <= 0 ? "display:none;" : ""; ?>" >
                    <label class="checkbox" htmlFor="<?php echo $slug; ?>">
                      <input
                        type="checkbox"
                        name="glossaryTerm"
                        value="<?php echo $id; ?>"
                        id="<?php echo $name; ?>"
                        data-color="<?php echo $color; ?>"
                        data-show="<?php echo join(",", $termCategoryIds); ?>"
                        <?php echo in_array($id, $glossaryTermParam) ? "checked" : ""; ?>
                      />
                      <?php echo sprintf($checkboxElement, $color, $name, $color); ?>
                    </label>
                  </li>
                <?php endforeach; ?>
              </ul>
              <div class="action-btn-container">
                <button class="wp-block-button__link wp-element-button submit-query desktop-submit-query">
                  Submit
                </button>
                <button class="wp-block-button__link wp-element-button reset-query">
                  Reset
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="lg:col-span-3 col-span-1">
        <?php if($results->have_posts()): ?>
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 md:grid-cols-2 md:gap-8 lg:gap-8">
          <?php
            $count = 0;
            while($results->have_posts()){
              $results->the_post();
              if($count === 6 && $term === null) {
                get_template_part('template-parts/browseContent/section', 'featuredContent');
              }

              if($count === 6 && $postType === null && $term === null) {
                get_template_part('template-parts/browseContent/section', 'curatedPlaylist');
              }

              get_template_part('template-parts/content/cards/browse', 'card');
              $count++;
            }
            wp_reset_query();
          ?>
        </div>
        <div>
        <?php
          $GLOBALS['wp_query'] = $results;
          the_posts_pagination(array('mid_size' => 2, 'prev_text' => __('‹'), 'next_text' => __('›') ));
        ?>
        </div>

        <hr />
        <?php else: ?>
          <h2 class="py-4">No Results Found.</h2>
        <?php endif; ?>
        <?php
          if($postType === $defaultPostType) {
            get_template_part('template-parts/browseContent/section', 'exploreTheTerms');
          }
        ?>
      </div>
    </div>
    <?php
      if($term !== null) {
        get_template_part('template-parts/browseContent/section', 'youMightAlsoLike');
      }
    ?>
  </div>
</section>