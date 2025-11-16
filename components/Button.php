<?php

    namespace components;

    class Button
    {
        public static function create( array $props ) : void
        {
            $text = $props['text'] ?? 'Valider';
            $type = $props['type'] ?? 'submit';
            $href = $props['href'] ?? null;
            $class = $props['class'] ?? 'btn btn-primary my-2';

            if( $href ) :
                ?>
                <a href="<?= htmlspecialchars( $href ) ?>" class="<?= htmlspecialchars( $class ) ?>">
                    <?= htmlspecialchars( $text ) ?>
                </a>
            <?php
            else :
                ?>
                <button
                        type="<?= htmlspecialchars( $type ) ?>"
                        class="<?= htmlspecialchars( $class ) ?>"
                >
                    <?= htmlspecialchars( $text ) ?>
                </button>
            <?php
            endif;
        }
    }
