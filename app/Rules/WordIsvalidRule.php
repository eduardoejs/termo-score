<?php

namespace App\Rules;

use App\Models\WordOfDay;
use Illuminate\Contracts\Validation\Rule;

class WordIsvalidRule implements Rule
{
    protected string $attribute;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        protected string $gameId,
    ) {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $this->attribute = $attribute;
        
        return WordOfDay::query()
                ->where('game_id', $this->gameId)
                ->where('word', $value)
                ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        // return 'The word is not valid.';
        return __('validation.exists', ['attribute' => $this->attribute]);
    }
}
