<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary Tree Visualization</title>
    <style>
        .tree {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .node {
            border: 1px solid #000;
            border-radius: 15px;
            padding: 10px;
            margin: 10px;
            display: inline-block;            
        }

        .connector {
            height: 20px;
            width: 2px;
            background: #d41818;
            margin: 0 auto;
        }

        .level {
            display: flex;
            justify-content: center;
            text-align: center;
            gap:2px;
            
        }
        /* div{
            padding-left:5px ;
        } */
    </style>
</head>

<body>
    <div id="tree" class="tree"></div>

    <script>
        const treeData = {
            "value": "a",
            "left": {
                "value": "b",
                "left": {
                    "value": "d",
                    "left": {
                        "value": "h"
                    },
                    "right": null
                },
                "right": {
                    "value": "e"
                }
            },
            "right": {
                "value": "c",
                "left": {
                    "value": "f"
                },
                "right": {
                    "value": "g"
                }
            }
        };

        function createNode(value, point) {
            const node = document.createElement('div');
            node.className = 'node';
            node.innerText = `${value}: ${point}`;
            return node;
        }

        function createConnector() {
            const connector = document.createElement('div');
            connector.className = 'connector';
            return connector;
        }

        function createLevel() {
            const level = document.createElement('div');
            level.className = 'level';
            return level;
        }

        function buildTree(node, treeElement) {
            if (!node) return { point: 0 };

            let point = 1000;
            const currentNode = createNode(node.value, point);
            treeElement.appendChild(currentNode);

            if (node.left || node.right) {
                const connector = createConnector();
                treeElement.appendChild(connector);

                const level = createLevel();
                treeElement.appendChild(level);

                if (node.left) {
                    const leftTreeElement = document.createElement('div');
                    const leftChild = buildTree(node.left, leftTreeElement);
                    level.appendChild(leftTreeElement);
                    point += leftChild.point * 0.1;
                }

                if (node.right) {
                    const rightTreeElement = document.createElement('div');
                    const rightChild = buildTree(node.right, rightTreeElement);
                    level.appendChild(rightTreeElement);
                    point += rightChild.point * 0.1;
                }
                
                // Update the current node's displayed value with the increased points
                currentNode.innerText = `${node.value}: ${(point)}`;
                if(point>=1210)
                {
                    
                    currentNode.innerText = `${node.value}: ${(point)}*`;
                }
                
               
            }

            return { point };
        }

        const treeElement = document.getElementById('tree');
        buildTree(treeData, treeElement);
    </script>
</body>

</html>
