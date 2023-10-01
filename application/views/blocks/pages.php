<!------------------- HOW TO SEARCH USERS start----------------->
    <section class="faq mt-5 mb-5 pb-5">
        <div class="container">
            <h2 class="text-center how_questions_title"><?= lang('how_to_search_users'); ?></h2>
            <div class="d-flex justify-content-center">
                <span class="divider">
                    <svg width="96" height="7" viewBox="0 0 96 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20.5" y="0.329163" width="55" height="6" rx="3"></rect>
                        <rect x="10.748" y="0.329163" width="6" height="6" rx="3"></rect>
                        <rect x="89.004" y="0.329163" width="6" height="6" rx="3">

                        </rect>
                        <rect x="0.995972" y="0.329163" width="6" height="6" rx="3"></rect>
                        <rect x="79.252" y="0.329163" width="6" height="6" rx="3"></rect>
                    </svg>
                </span>
            </div>
            <div class="how_to_search_users">
            	<div class="how_to_search_users_area">
            		<?php foreach ($pages as $key => $value): ?>
            			<a class="how_to_search_users_link" href="<?=base_url("{$locale}/{$value['slug']}") ?>"><?=$value['title']; ?></a>
            		<?php endforeach ?>
            	</div>
            </div>
        </div>
    </section>
    <!------------------- HOW TO SEARCH USERS AND----------------->