<?php

namespace PinaSimpleControls\Model;

class Grid
{

    protected $maxColumns = 0;
    protected $tiles = [];
    protected $starts = [];
    protected $limits = [];

    public function addTileSize($width, $margin, $start = 0, $limit = 0)
    {
        if ($limit > $this->maxColumns) {
            $this->maxColumns = $limit;
        }

        $this->tiles[$width] = $margin;
        ksort($this->tiles);
        if ($start) {
            $this->starts[$width] = $start;
        }
        if ($limit) {
            $this->limits[$width] = $limit;
        }
    }


    public function calcMinScreenWidth($needleWidth)
    {
        $prevMinWidth = 0;
        for ($columns = 1; $columns < $this->maxColumns; $columns ++) {
            foreach ($this->tiles as $w => $m) {
                if (isset($this->starts[$w]) && $columns <= $this->starts[$w]) {
                    continue;
                }
                if (isset($this->limits[$w]) && $columns > $this->limits[$w]) {
                    continue;
                }
                $containerWidth = $w * $columns + $m * ($columns - 1);
                if ($containerWidth < $prevMinWidth) {
                    continue;
                }
                if ($needleWidth <= $containerWidth) {
                    return $containerWidth + ($prevMinWidth ? ($m * 2) : 0);
                }
                $prevMinWidth = $containerWidth;
            }
        }
        return $prevMinWidth;
    }

    public function fetch()
    {
        $prevMinWidth = 0;
        $steps = [];
        for ($columns = 1; $columns <= $this->maxColumns + 1; $columns ++) {
            foreach ($this->tiles as $w => $m) {
                if (isset($this->starts[$w]) && $columns <= $this->starts[$w]) {
                    continue;
                }
                if (isset($this->limits[$w]) && $columns > $this->limits[$w]) {
                    continue;
                }

                $containerWidth = $w * $columns + $m * ($columns - 1);
                if ($containerWidth < $prevMinWidth) {
                    continue;
                }

                $steps[] = [$w, $m, $columns];
                $prevMinWidth = $containerWidth;
            }
        }
        foreach ($steps as $k => $step) {
            $containerWidth = $this->getContainerWidth($step, false);
            $screenWidth = isset($steps[$k+1]) ? ($this->getContainerWidth($steps[$k+1], true) - 1): null;
            $steps[$k][] = $containerWidth;
            $steps[$k][] = $screenWidth;
        }
//        array_pop($steps);
        return $steps;
    }

    protected function getContainerWidth($step, $addMargin)
    {
        list ($w, $m, $columns) = $step;
        return $w * $columns + $m * ($columns - 1) + ($addMargin ? $m * 2 : 0);
    }

}