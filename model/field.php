<?php
namespace model;

class field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';
    public string $type;
    public string $attribute;

    public function __construct(string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf(
            '
                <div class="mb-4 form-outline">
                <label class="form-label" for="form1Example13">%s</label>
                <input type="%s" name="%s"  class="form-control form-control-lg" />
                </div>
            ',
            $this->getLabel($this->attribute),
            $this->type,
            $this->attribute
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function getLabel($attribute)
    {
        return $this->labels()[$attribute] ?? $attribute;
    }

    public function labels(): array
    {
        return [
            'fullname' => 'Fullname',
            'email' => 'Email Address',
            'password' => 'Password',
            'confirmpassword' => 'Confirm Password',
        ];
    }
}