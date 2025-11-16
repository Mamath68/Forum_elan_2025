<?php

    namespace components;

    class Textarea
    {
        public static function create( array $props ) : void
        {
            $label = $props['label'] ?? null;
            $name = $props['name'] ?? '';
            $placeholder = $props['placeholder'] ?? '';
            $value = $props['value'] ?? '';
            $rows = $props['rows'] ?? 5;
            $class = $props['class'] ?? 'form-control';
            $required = isset( $props['required'] ) && $props['required'] ? 'required' : '';
            ?>
            <?php FormGroup::open();
            if( $label ): ?>
                <label for="<?= $name ?>" class="form-label">
                    <?= htmlspecialchars( $label ) ?>
                </label>
            <?php endif; ?>

            <textarea
                    id="<?= htmlspecialchars( $name ) ?>"
                    name="<?= htmlspecialchars( $name ) ?>"
                    class="<?= htmlspecialchars( $class ) ?>"
                    placeholder="<?= htmlspecialchars( $placeholder ) ?>"
                    rows="<?= htmlspecialchars( $rows ) ?>"
                <?= $required ?>
            ><?= htmlspecialchars( $value ) ?></textarea>
            <?php FormGroup::close();
        }
    }
