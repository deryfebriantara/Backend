<?php

namespace Persona\Hris\Repository\ORM;

use Persona\Hris\Core\Manager\ManagerFactory;
use Persona\Hris\Repository\AbstractRepository;
use Persona\Hris\Salary\Model\PayrollDetailInterface;
use Persona\Hris\Salary\Model\PayrollDetailRepositoryInterface;
use Persona\Hris\Salary\Model\PayrollInterface;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@personahris.com>
 */
final class PayrollDetailRepository extends AbstractRepository implements PayrollDetailRepositoryInterface
{
    /**
     * @var string
     */
    private $class;

    /**
     * @param ManagerFactory $managerFactory
     * @param string         $class
     */
    public function __construct(ManagerFactory $managerFactory, string  $class)
    {
        parent::__construct($managerFactory);
        $this->class = $class;
    }

    /**
     * @param PayrollInterface $payroll
     *
     * @return null|PayrollDetailInterface
     */
    public function findByPayroll(PayrollInterface $payroll): ? PayrollDetailInterface
    {
        return $this->managerFactory->getWriteManager()->getRepository($this->class)->findOneBy(['payroll' => $payroll, 'deletedAt' => null]);
    }
}
