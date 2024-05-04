<div x-data="$store.settings">
    <section class="container mt-6 flex w-full h-screen justify-center " x-show="!ready">
        <div class="self-center flex flex-col">
            <svg class=" self-center w-30" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="width:7.5rem; margin:auto; display:block;" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <defs>
                    <path id="path" d="M50 15A15 35 0 0 1 50 85A15 35 0 0 1 50 15" fill="none"></path>
                    <path id="patha" d="M0 0A15 35 0 0 1 0 70A15 35 0 0 1 0 0" fill="none"></path>
                </defs>
                <g transform="rotate(0 50 50)">
                    <use xlink:href="#path" stroke="#f1f2f3" stroke-width="3"></use>
                </g>
                <g transform="rotate(60 50 50)">
                    <use xlink:href="#path" stroke="#f1f2f3" stroke-width="3"></use>
                </g>
                <g transform="rotate(120 50 50)">
                    <use xlink:href="#path" stroke="#f1f2f3" stroke-width="3"></use>
                </g>
                <g transform="rotate(0 50 50)">
                    <circle cx="50" cy="15" r="9" fill="#e15b64">
                        <animateMotion dur="1s" repeatCount="indefinite" begin="0s">
                            <mpath xlink:href="#patha"></mpath>
                        </animateMotion>
                    </circle>
                </g>
                <g transform="rotate(60 50 50)">
                    <circle cx="50" cy="15" r="9" fill="#f8b26a">
                        <animateMotion dur="1s" repeatCount="indefinite" begin="-0.16666666666666666s">
                            <mpath xlink:href="#patha"></mpath>
                        </animateMotion>
                    </circle>
                </g>
                <g transform="rotate(120 50 50)">
                    <circle cx="50" cy="15" r="9" fill="#abbd81">
                        <animateMotion dur="1s" repeatCount="indefinite" begin="-0.3333333333333333s">
                            <mpath xlink:href="#patha"></mpath>
                        </animateMotion>
                    </circle>
                </g>
            </svg>
        </div>
    </section>
    <table class="wp-list-table widefat plugins" x-show="hasBookmarks()">
        <thead>
            <tr>
                <td id="cb" style="width:3%" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1"><?php _e("Select All", POS_TEXT_DOMAIN); ?></label><input id="cb-select-all-1" type="checkbox"></td>
                <th scope="col" id="name" class="manage-column column-name column-primary" style="width: 25%;"><?php _e("Plugin", POS_TEXT_DOMAIN); ?></th>
                <th scope="col" id="description" class="manage-column column-description"><?php _e("Description", POS_TEXT_DOMAIN); ?></th>
                <th scope="col" id="auto-updates" class="manage-column column-auto-updates hidden"><?php _e("Automatic Updates", POS_TEXT_DOMAIN); ?></th>
            </tr>
        </thead>

        <tbody id="the-list">
            <template x-for="(bookmark,index) in bookmarks">
                <tr :class='{active:bookmark.actionText=="Deactivate",deactive:bookmark.actionText=="Activate"}' :data-slug="bookmark.slug" x-show="bookmark.slug">
                    <th scope="row" class="check-column" style="padding-top: 8px;">
                        <input type="checkbox" name="checked[]" :value="bookmark.slug" :id="bookmark.slug">
                    </th>
                    <td class="plugin-title column-primary" width="25%">
                        <img class="pos-plugin-image" style="width: 60px; height: 60px; padding-right: 0px; margin-right: 12px;" :src="bookmark.image">
                        <strong x-text="titleCase(bookmark.slug)"></strong>
                        <div class="row-actions visible">
                            <span class="activate"><a class="text-[#2873AF]" href="#" @click="processPlugin(bookmark.slug)" x-text="bookmark.actionText"></a> | </span>
                            <span class="delete"><a class="text-[#2873AF]" href="#" @click="Bookmarks.unBookmark(bookmark.plugin_id); removeBookmark(index)"><?php _e("Unbookmark", POS_TEXT_DOMAIN); ?></a></span>
                        </div>
                        <button type="button" class="toggle-row"><span class="screen-reader-text"><?php _e("Show Details", POS_TEXT_DOMAIN); ?></span></button>
                    </td>
                    <td class="column-description desc">
                        <div class="plugin-description">
                            <p x-text="bookmark.description"></p>
                        </div>
                        <div class="inactive is-uninstallable second plugin-version-author-uri">
                            <a :href="bookmark.url" class="text-[#2873AF]" target="_blank"><?php _e("Details", POS_TEXT_DOMAIN); ?></a> |
                            <span class="bm-dev-link" x-html="makeExternal(bookmark.developer)"></span>
                        </div>
                    </td>
                    <td class="column-auto-updates hidden"><a href="plugins.php?action=enable-auto-update&amp;plugin=contact-form-7%2Fwp-contact-form-7.php&amp;paged=1&amp;plugin_status=all&amp;_wpnonce=10fc08417d" class="toggle-auto-update aria-button-if-js" data-wp-action="enable" role="button"><span class="dashicons dashicons-update spin hidden" aria-hidden="true"></span><span class="label">Enable auto-updates</span></a>
                        <div class="notice notice-error notice-alt inline hidden">
                            <p></p>
                        </div>
                    </td>
                </tr>
            </template>
        </tbody>

        <tfoot>
            <tr>
                <td id="cb" style="width:3%" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1"><?php _e("Select All", POS_TEXT_DOMAIN); ?></label><input id="cb-select-all-1" type="checkbox"></td>
                <th scope="col" id="name" class="manage-column column-name column-primary" style="width: 25%;"><?php _e("Plugin", POS_TEXT_DOMAIN); ?></th>
                <th scope="col" id="description" class="manage-column column-description"><?php _e("Description", POS_TEXT_DOMAIN); ?></th>
                <th scope="col" id="auto-updates" class="manage-column column-auto-updates hidden"><?php _e("Automatic Updates", POS_TEXT_DOMAIN); ?></th>
            </tr>
        </tfoot>

    </table>
    <p x-show="!hasBookmarks()">
        <?php _e("You don't have any bookmarks yet", POS_TEXT_DOMAIN); ?>
    </p>
    <template x-teleport="#pos-notice">
        <div x-data="notice" x-show="notice.display" x-collapse>
            <div class="notice notice-warning is-dismissible">
                <p x-text="notice.message"></p>
                <button type="button" class="notice-dismiss" @click="notice.display=false">
                    <span class="screen-reader-text"><?php _e("Dismiss this notice.", POS_TEXT_DOMAIN); ?></span>
                </button>
            </div>
        </div>
    </template>
</div>