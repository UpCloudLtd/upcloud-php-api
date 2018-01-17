<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Workflow\Dumper;

use Symfony\Component\Workflow\Definition;
use Symfony\Component\Workflow\Marking;

/**
 * GraphvizDumper dumps a workflow as a graphviz file.
 *
 * You can convert the generated dot file with the dot utility (http://www.graphviz.org/):
 *
 *   dot -Tpng workflow.dot > workflow.png
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Grégoire Pineau <lyrixx@lyrixx.info>
 */
class GraphvizDumper implements DumperInterface
{
    protected static $defaultOptions = array(
        'graph' => array('ratio' => 'compress', 'rankdir' => 'LR'),
        'node' => array('fontsize' => 9, 'fontname' => 'Arial', 'color' => '#333333', 'fillcolor' => 'lightblue', 'fixedsize' => true, 'width' => 1),
        'edge' => array('fontsize' => 9, 'fontname' => 'Arial', 'color' => '#333333', 'arrowhead' => 'normal', 'arrowsize' => 0.5),
    );

    /**
     * {@inheritdoc}
     *
     * Dumps the workflow as a graphviz graph.
     *
     * Available options:
     *
     *  * graph: The default options for the whole graph
     *  * node: The default options for nodes (places + transitions)
     *  * edge: The default options for edges
     */
    public function dump(Definition $definition, Marking $marking = null, array $options = array())
    {
        $places = $this->findPlaces($definition, $marking);
        $transitions = $this->findTransitions($definition);
        $edges = $this->findEdges($definition);

        $options = array_replace_recursive(self::$defaultOptions, $options);

        return $this->startDot($options)
            .$this->addPlaces($places)
            .$this->addTransitions($transitions)
            .$this->addEdges($edges)
            .$this->endDot();
    }

    /**
     * @internal
     */
    protected function findPlaces(Definition $definition, Marking $marking = null)
    {
        $places = array();

        foreach ($definition->getPlaces() as $place) {
            $attributes = array();
            if ($place === $definition->getInitialPlace()) {
                $attributes['style'] = 'filled';
            }
            if ($marking && $marking->has($place)) {
                $attributes['color'] = '#FF0000';
                $attributes['shape'] = 'doublecircle';
            }
            $places[$place] = array(
                'attributes' => $attributes,
            );
        }

        return $places;
    }

    /**
     * @internal
     */
    protected function findTransitions(Definition $definition)
    {
        $transitions = array();

        foreach ($definition->getTransitions() as $transition) {
            $transitions[] = array(
                'attributes' => array('shape' => 'box', 'regular' => true),
                'name' => $transition->getName(),
            );
        }

        return $transitions;
    }

    /**
     * @internal
     */
    protected function addPlaces(array $places)
    {
        $code = '';

        foreach ($places as $id => $place) {
            $code .= sprintf("  place_%s [label=\"%s\", shape=circle%s];\n", $this->dotize($id), $id, $this->addAttributes($place['attributes']));
        }

        return $code;
    }

    /**
     * @internal
     */
    protected function addTransitions(array $transitions)
    {
        $code = '';

        foreach ($transitions as $place) {
            $code .= sprintf("  transition_%s [label=\"%s\", shape=box%s];\n", $this->dotize($place['name']), $place['name'], $this->addAttributes($place['attributes']));
        }

        return $code;
    }

    /**
     * @internal
     */
    protected function findEdges(Definition $definition)
    {
        $dotEdges = array();

        foreach ($definition->getTransitions() as $transition) {
            foreach ($transition->getFroms() as $from) {
                $dotEdges[] = array(
                    'from' => $from,
                    'to' => $transition->getName(),
                    'direction' => 'from',
                );
            }
            foreach ($transition->getTos() as $to) {
                $dotEdges[] = array(
                    'from' => $transition->getName(),
                    'to' => $to,
                    'direction' => 'to',
                );
            }
        }

        return $dotEdges;
    }

    /**
     * @internal
     */
    protected function addEdges(array $edges)
    {
        $code = '';

        foreach ($edges as $edge) {
            $code .= sprintf("  %s_%s -> %s_%s [style=\"solid\"];\n",
                'from' === $edge['direction'] ? 'place' : 'transition',
                $this->dotize($edge['from']),
                'from' === $edge['direction'] ? 'transition' : 'place',
                $this->dotize($edge['to'])
            );
        }

        return $code;
    }

    /**
     * @internal
     */
    protected function startDot(array $options)
    {
        return sprintf("digraph workflow {\n  %s\n  node [%s];\n  edge [%s];\n\n",
            $this->addOptions($options['graph']),
            $this->addOptions($options['node']),
            $this->addOptions($options['edge'])
        );
    }

    /**
     * @internal
     */
    protected function endDot()
    {
        return "}\n";
    }

    /**
     * @internal
     */
    protected function dotize($id)
    {
        return strtolower(preg_replace('/[^\w]/i', '_', $id));
    }

    private function addAttributes(array $attributes)
    {
        $code = array();

        foreach ($attributes as $k => $v) {
            $code[] = sprintf('%s="%s"', $k, $v);
        }

        return $code ? ', '.implode(', ', $code) : '';
    }

    private function addOptions(array $options)
    {
        $code = array();

        foreach ($options as $k => $v) {
            $code[] = sprintf('%s="%s"', $k, $v);
        }

        return implode(' ', $code);
    }
}
