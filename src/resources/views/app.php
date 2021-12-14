<style type="text/css" media="screen">
    <?php include_once dirname(__DIR__, 1) . '/css/app.css'; ?>
</style>
<div class="w-full p-5 text-white absolute top-0 bg-gray-700">
    <div class="flex justify-between align-middle">
        <div class="font-bold mb-5 text-gray-400">
            <a href="https://stackoverflow.com/search?q=[php]+<?php echo str_replace(' ', '+', \AdrianMejias\Blunder\Blunder::entities($this->stackTrace['message'])); ?>" target="_blank" rel="nofollow">
                <div class="inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                        <path d="M0 0h24v24H0z" stroke="none"></path>
                        <circle cx="10" cy="10" r="7"></circle>
                        <path d="M21 21l-6-6"></path>
                    </svg>
                </div>
                <span class="ml-1">Search Stack Overflow</span>
            </a>
        </div>
        <div class="font-bold mb-5 text-gray-400">
            <?php echo $this->stackTrace['type']; ?>
            (<?php echo $this->stackTrace['code']; ?>)
        </div>
    </div>
    <div class="flex justify-between align-middle text-sm mb-2">
        <div>
            <?php if (empty($this->stackTrace['open_with'])) : ?>
                <?php echo $this->stackTrace['file']; ?>
            <?php else : ?>
                <a href="<?php echo $this->stackTrace['open_with']; ?>" rel="nofollow"><?php echo $this->stackTrace['file']; ?></a>
            <?php endif; ?>
        </div>
        <div>
            <?php echo $this->stackTrace['message']; ?>
        </div>
    </div>
    <div class="w-full mx-auto overflow-hidden overflow-x-auto whitespace-nowrap bg-white text-gray-700 text-xs">
        <code><?php echo $this->preview; ?></code>
    </div>
    <?php foreach ($this->variables as $name => $variables) : ?>
        <?php if (!empty($variables)) : ?>
            <div class="mt-3">
                <div class="font-bold mb-3 text-gray-400">
                    <?php echo $name; ?>
                </div>
                <div class="text-gray-400 text-sm">
                    <?php foreach ($variables as $key => $value) : ?>
                        <div class="flex justify-start align-middle">
                            <div class="whitespace-nowrap">
                                [ <?php echo $key; ?> ] =&gt;
                            </div>
                            <div class="ml-1 text-gray-300 truncate overflow-hidden">
                                <?php echo is_string($value) ? \AdrianMejias\Blunder\Blunder::entities($value) : print_r($value, true); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<script type="module" src="https://cdn.skypack.dev/twind/shim" defer></script>
