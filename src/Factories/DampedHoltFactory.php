<?php


namespace Litipk\TimeSeries\Factories;


use Litipk\TimeSeries\Predictors\DampedHoltPredictor;


/**
 * Class HoltFactory
 * @package Litipk\TimeSeries
 */
class DampedHoltFactory extends DampedExponentialSmoothingFactory
{
    /** @var  HoltFactory */
    private static $defaultInstance = null;

    /**
     * @param integer $nStepsPerParam
     * @param integer $predictionHorizon
     */
    public function __construct($nStepsPerParam, $predictionHorizon)
    {
        parent::__construct($nStepsPerParam, $predictionHorizon);
    }

    /**
     * @return PredictorFactory
     */
    protected static function getDefaultInstance()
    {
        if (null === static::$defaultInstance) {
            static::$defaultInstance = new static(101, +INF);
        }
        return static::$defaultInstance;
    }


    /**
     * @param double $alpha
     * @param double $beta
     * @param double $theta
     * @param double $level
     * @return DampedHoltPredictor
     */
    protected function getPredictor($alpha, $beta, $theta, $level)
    {
        return new DampedHoltPredictor($alpha, $beta, $theta, $level);
    }
}
