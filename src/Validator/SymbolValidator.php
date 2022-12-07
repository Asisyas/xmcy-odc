<?php

namespace App\Validator;

use App\Business\Company\Receiver\CompanyReceiverInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class SymbolValidator extends ConstraintValidator
{
    public function __construct(
        private readonly CompanyReceiverInterface $companyReceiver
    )
    {

    }

    /**
     * {@inheritDoc}
     */
    public function validate($value, Constraint $constraint): void
    {
        if (null === $value || '' === $value) {
            return;
        }

        $success = false;
        foreach($this->companyReceiver->receiveCompanyCollection() as $company) {
            if($company->getSymbol() !== $value) {
                continue;
            }

            $success = true;

            break;
        }

        if($success) {
            return;
        }

        // TODO: implement the validation here
        $this->context->buildViolation($constraint->message)
            ->setParameter('{{ value }}', $value)
            ->addViolation();
    }
}
